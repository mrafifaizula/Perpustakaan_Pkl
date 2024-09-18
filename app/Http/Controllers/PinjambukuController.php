<?php

namespace App\Http\Controllers;

use App\Models\Pinjambuku;
use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;
use Alert;
use Auth;
use Illuminate\Http\Request;

class PinjambukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $pinjambuku = Pinjambuku::where('id_user', $user->id)
            ->whereIn('status', ['menunggu', 'diterima', 'menunggu pengembalian'])
            ->get();

        // Fetch notifications for dropdown
        $notifications = Pinjambuku::whereIn('status', ['menunggu pengembalian', 'diterima', 'ditolak', 'pengembalian ditolak',  'dikembalikan'])
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return view('profil.peminjamanBuku', compact('buku', 'kategori', 'penulis', 'penerbit', 'user', 'pinjambuku', 'notifications'));
    }
    

    public function create()
    {
        $pinjambuku = Pinjambuku::all();
        $buku = Buku::all();
        $user = User::all();
        return view('frontend.pinjambuku', compact('pinjambuku', 'buku', 'user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jumlah' => 'required|numeric',
            'tanggal_pinjambuku' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'id_buku' => 'required|numeric',
            'id_user' => 'required|numeric',
        ]);

        $buku = Buku::findOrFail($request->id_buku);

        if ($request->jumlah > $buku->jumlah_buku) {
            Alert::error('Gagal', 'Stok buku tidak mencukupi.')->autoClose(2000);
            return redirect()->back()->with('error', 'Stok buku tidak mencukupi.');
        }

        $pinjamjudul = Pinjambuku::where('id_user', $request->id_user)
            ->where('id_buku', $request->id_buku)
            ->orderBy('created_at', 'desc') // Ambil yang terbaru
            ->first();

        if ($pinjamjudul) {
            if ($pinjamjudul->status == 'menunggu') {
                Alert::info('InfoAlert', 'Peminjaman buku ini masih dalam proses persetujuan.')->autoClose(2000);
                return redirect()->back()->with('error', 'Peminjaman buku ini masih dalam proses persetujuan.');
            } elseif ($pinjamjudul->status == 'diterima') {
                Alert::error('Gagal', 'Anda masih meminjam buku ini.')->autoClose(2000);
                return redirect()->back()->with('error', 'Anda masih meminjam buku ini.');
            } elseif ($pinjamjudul->status == 'dikembalikan') {
                Alert::info('Info', 'Buku ini sudah dikembalikan. Anda bisa meminjam lagi.')->autoClose(2000);
            }
        }

        $pinjambuku = new Pinjambuku();
        $pinjambuku->jumlah = $request->jumlah;
        $pinjambuku->tanggal_pinjambuku = $request->tanggal_pinjambuku;
        $pinjambuku->tanggal_kembali = $request->tanggal_kembali;
        $pinjambuku->status = 'menunggu';
        $pinjambuku->id_buku = $request->id_buku;
        $pinjambuku->id_user = $request->id_user;

        $pinjambuku->save();

        $buku->jumlah_buku -= $request->jumlah;
        $buku->save();

        Alert::success('Success', 'Permintaan peminjaman buku berhasil dibuat. Menunggu persetujuan.')->autoClose(1000);
        return redirect()->route('profil.peminjamanBuku');
    }



    // menyetujui peminjaman
    public function menyetujui($id)
    {

        $pinjambuku = Pinjambuku::findOrFail($id);

        if ($pinjambuku->status == 'menunggu') {
            $buku = Buku::findOrFail($pinjambuku->id_buku);
            if ($buku->jumlah_buku >= $pinjambuku->jumlah) {
                $buku->jumlah_buku -= $pinjambuku->jumlah;
                $buku->save();

                $pinjambuku->status = 'diterima';
                $pinjambuku->save();

                Alert::success('Sukses', 'Peminjaman buku disetujui.')->autoClose(2000);
            } else {
                Alert::error('Gagal', 'Stok buku tidak mencukupi')->autoClose(2000);
            }
        } else {
            Alert::error('Gagal', 'Pengajuan peminjaman sudah diproses.')->autoClose(2000);
        }

        return redirect()->route('admin.dataPeminjaman.permintaanPeminjaman');
    }


    // batalpengajuan
    public function batalkanpengajuan($id)
    {
        $item = Pinjambuku::findOrFail($id);

        if ($item->status === 'menunggu') {
            $item->status = 'dibatalkan';
            $item->save();

            return redirect()->back()->with('success', 'Pengajuan berhasil dibatalkan.');
        }

        return redirect()->back()->with('error', 'Pengajuan tidak dapat dibatalkan.');
    }


    // tolak peminjaman
    public function tolakpengajuan(Request $request, $id)
    {
        $pinjambuku = Pinjambuku::findOrFail($id);

        if ($pinjambuku->status == 'menunggu') {
            $pesan = $request->input('pesan', 'Alasan tidak disebutkan');
            $pinjambuku->status = 'ditolak';
            $pinjambuku->pesan = $pesan;
            $pinjambuku->save();

            Alert::success('Sukses', 'Pengajuan pengembalian telah ditolak.')->autoClose(2000);
            return redirect()->back()->with('message', 'Pengajuan pengembalian untuk buku "' . $pinjambuku->buku->judul . '" telah ditolak. Alasan: ' . $pesan);
        }

        return redirect()->back()->with('error', 'Pengajuan pengembalian sudah diproses atau tidak valid.');
    }



    // ajukan pengembalian
    public function ajukanpengembalian($id)
    {
        $pinjambuku = PinjamBuku::findOrFail($id);

        if ($pinjambuku->status == 'diterima') {
            $pinjambuku->status = 'menunggu pengembalian';
            $pinjambuku->save();

            Alert::success('Sukses', 'Permintaan pengembalian berhasil diajukan. Tunggu persetujuan admin.')->autoClose(2000);
        } else {
            Alert::error('Gagal', 'Pengajuan peminjaman belum disetujui, buku tidak dapat dikembalikan.')->autoClose(2000);
        }

        return redirect()->route('profil.peminjamanBuku');
    }

    // batalkan pengembalian
    public function batalkanpengajuanpengembalian($id)
    {
        $pinjambuku = PinjamBuku::findOrFail($id);

        if ($pinjambuku->status == 'menunggu pengembalian') {
            $pinjambuku->status = 'diterima';
            $pinjambuku->save();

            Alert::success('Sukses', 'Pengajuan pengembalian berhasil dibatalkan.')->autoClose(2000);
        } else {
            Alert::error('Gagal', 'Pengajuan pengembalian tidak dapat dibatalkan.')->autoClose(2000);
        }

        return redirect()->route('profil.peminjamanBuku');
    }

    public function tolakpengembalian(Request $request, $id)
    {
        $pinjambuku = Pinjambuku::findOrFail($id);

        if ($pinjambuku->status == 'menunggu pengembalian') {
            $pesan = $request->input('pesan', 'Alasan tidak disebutkan');
            $pinjambuku->status = 'pengembalian ditolak';
            $pinjambuku->pesan = $pesan;
            $pinjambuku->save();

            Alert::success('Sukses', 'Pengajuan pengembalian telah ditolak.')->autoClose(2000);
            return redirect()->back()->with('message', 'Pengajuan pengembalian untuk buku "' . $pinjambuku->buku->judul . '" telah ditolak. Alasan: ' . $pesan);
        }

        return redirect()->back()->with('error', 'Pengajuan pengembalian sudah diproses atau tidak valid.');
    }



    // mnerima pengembalian
    public function accpengembalian($id)
    {
        $pinjambuku = PinjamBuku::findOrFail($id);

        if ($pinjambuku->status == 'menunggu pengembalian') {
            $buku = Buku::findOrFail($pinjambuku->id_buku);
            $buku->jumlah_buku += $pinjambuku->jumlah;
            $buku->save();

            $pinjambuku->status = 'dikembalikan';
            $pinjambuku->save();

            Alert::success('Sukses', 'Pengembalian buku berhasil disetujui.')->autoClose(2000);
        } else {
            Alert::error('Gagal', 'Pengembalian buku tidak dapat diproses.')->autoClose(2000);
        }

        return redirect()->route('admin.dataPeminjaman.permintaanPeminjaman');
    }

}