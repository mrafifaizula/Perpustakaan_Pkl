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

        // Perbaikan di where('id_user', $user->id)
        $pinjambuku = PinjamBuku::where('id_user', $user->id)
            ->whereIn('status', ['menunggu', 'diterima', 'menunggu pengembalian'])
            ->get();

        confirmDelete('Batalkan', 'Apakah Kamu Yakin?');
        return view('profil.datapinjambuku.index', compact('buku', 'kategori', 'penulis', 'penerbit', 'user', 'pinjambuku'));
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
            'jumlah' => 'required|max:3',
            'tanggal_pinjambuku' => 'required',
            'tanggal_kembali' => 'required',
            // 'status' => 'required',
            'id_buku' => 'required|max:3',
            'id_user' => 'required',
        ]);

        $pinjambuku = new Pinjambuku();
        $pinjambuku->jumlah = $request->jumlah;
        $pinjambuku->tanggal_pinjambuku = $request->tanggal_pinjambuku;
        $pinjambuku->tanggal_kembali = $request->tanggal_kembali;
        $pinjambuku->status = 'menunggu';
        $pinjambuku->id_buku = $request->id_buku;
        $pinjambuku->id_user = $request->id_user;

        $buku = Buku::findOrFail($request->id_buku);
        $judul_buku = $buku->judul;

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
            } elseif ($pinjamjudul->status == 'returned') {
                Alert::info('Info', 'Buku ini sudah dikembalikan. Anda bisa meminjam lagi.')->autoClose(2000);
            }
        }

        // Validate maksimal pinjam buku
        $user = Auth::user();
        $minimal4 = Pinjambuku::where('id_user', $user->id)->count();

        if ($minimal4 >= 4) {
            Alert::error('Gagal', 'Anda sudah meminjam maksimal 5 buku.')->autoClose(2000);
            return redirect()->back()->with(['error' => 'Anda sudah meminjam maksimal 5 buku.']);
        }

        $pinjambuku->save();

        Alert::success('Success', 'Permintaan peminjaman buku berhasil dibuat. Menunggu persetujuan.')->autoClose(1000);
        return redirect()->route('profil.datapinjambuku.index');
    }



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

        return redirect()->route('admin.pinjambuku.index');
    }


    // batalpengajuan
    public function batalkanPengajuan($id)
    {
        $item = Pinjambuku::findOrFail($id);

        // Ensure the status is 'menunggu' before proceeding
        if ($item->status === 'menunggu') {
            $item->status = 'dibatalkan'; // Update to a status that represents a canceled request
            $item->save();

            return redirect()->back()->with('success', 'Pengajuan berhasil dibatalkan.');
        }

        return redirect()->back()->with('error', 'Pengajuan tidak dapat dibatalkan.');
    }



    // tolak peminjaman
    public function tolak($id)
    {
        $pinjambuku = Pinjambuku::findOrFail($id);

        if ($pinjambuku->status == 'menunggu') {
            $pinjambuku->status = 'ditolak';
            $pinjambuku->save();

            Alert::success('Sukses', 'Pengajuan peminjaman ditolak.')->autoClose(2000);
            return redirect()->back()->with('message', 'Pengajuan peminjaman ditolak.');
        }

        return redirect()->back()->with('error', 'Pengajuan peminjaman sudah diproses.');
    }


    // ajukan pengembalian
    public function ajukanPengembalian($id)
    {
        $pinjambuku = PinjamBuku::findOrFail($id);

        // Hanya bisa ajukan pengembalian jika status 'diterima'
        if ($pinjambuku->status == 'diterima') {
            // Ubah status menjadi 'menunggu pengembalian'
            $pinjambuku->status = 'menunggu pengembalian';
            $pinjambuku->save();

            // Tampilkan alert sukses
            Alert::success('Sukses', 'Permintaan pengembalian berhasil diajukan. Tunggu persetujuan admin.')->autoClose(2000);
        } else {
            Alert::error('Gagal', 'Pengajuan peminjaman belum disetujui, buku tidak dapat dikembalikan.')->autoClose(2000);
        }

        return redirect()->route('profil.datapinjambuku.index');
    }

    // batalkan pengembalian
    public function batalkanPengajuanPengembalian($id)
    {
        $pinjambuku = PinjamBuku::findOrFail($id);

        // Hanya bisa batalkan jika status 'menunggu pengembalian'
        if ($pinjambuku->status == 'menunggu pengembalian') {
            // Ubah status kembali menjadi 'diterima'
            $pinjambuku->status = 'diterima';
            $pinjambuku->save();

            // Tampilkan alert sukses
            Alert::success('Sukses', 'Pengajuan pengembalian berhasil dibatalkan.')->autoClose(2000);
        } else {
            Alert::error('Gagal', 'Pengajuan pengembalian tidak dapat dibatalkan.')->autoClose(2000);
        }

        return redirect()->route('profil.datapinjambuku.index');
    }




    // mnerima pengembalian
    public function accPengembalian($id)
    {
        $pinjambuku = PinjamBuku::findOrFail($id);

        // Hanya bisa menyetujui jika status 'menunggu pengembalian'
        if ($pinjambuku->status == 'menunggu pengembalian') {
            // Tambahkan buku kembali ke stok
            $buku = Buku::findOrFail($pinjambuku->id_buku);
            $buku->jumlah_buku += $pinjambuku->jumlah;
            $buku->save();

            // Ubah status menjadi 'dikembalikan'
            $pinjambuku->status = 'dikembalikan';
            $pinjambuku->save();

            // Tampilkan alert sukses
            Alert::success('Sukses', 'Pengembalian buku berhasil disetujui.')->autoClose(2000);
        } else {
            Alert::error('Gagal', 'Pengembalian buku tidak dapat diproses.')->autoClose(2000);
        }

        return redirect()->route('admin.pinjambuku.index');
    }




    public function show($id)
    {


    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }


    public function destroy(pinjambuku $pinjambuku)
    {
        //
    }
}
