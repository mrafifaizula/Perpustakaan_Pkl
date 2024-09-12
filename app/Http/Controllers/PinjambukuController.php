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

    $pinjambuku = PinjamBuku::where('id_user', operator: $user->id)
    ->whereIn('status', ['menunggu', 'diterima'])
    ->get();


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


    public function kembalikan($id)
    {
        $pinjambuku = PinjamBuku::findOrFail($id);
    
        if ($pinjambuku->status == 'diterima') {
            $buku = Buku::findOrFail($pinjambuku->id_buku);
            $buku->jumlah_buku += $pinjambuku->jumlah;
            $buku->save();
    
            $pinjambuku->status = 'dikembalikan';
            $pinjambuku->save();
    
            Alert::success('Sukses', 'Buku berhasil dikembalikan.')->autoClose(2000);
        } else {
            Alert::error('Gagal', 'Pengajuan peminjaman tidak dapat dikembalikan.')->autoClose(2000);
        }
    
        return redirect()->route('profil.datapinjambuku.index');
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
