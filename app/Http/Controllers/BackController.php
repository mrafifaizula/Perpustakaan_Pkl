<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\User;
use App\Models\Pinjambuku;
use Auth;

class BackController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $user = Auth::user();
        $user = User::all();
        $notifymenunggu = Pinjambuku::where('status', 'menunggu')->count();
        $notifpengajuankembali = Pinjambuku::where('status', 'menunggu pengembalian')->count();

        return view('admin.dashboard', compact('buku', 'kategori', 'penulis', 'penerbit', 'user', 'notifymenunggu', 'notifpengajuankembali'));
    }

    public function permintaan()
    {
        $pinjambuku = Pinjambuku::whereIn('status', ['menunggu', 'menunggu pengembalian'])->get();
        $buku = Buku::all();
        $user = User::all();
        $notifymenunggu = Pinjambuku::where('status', 'menunggu')->count();
        $notifpengajuankembali = Pinjambuku::where('status', 'menunggu pengembalian')->count();

        return view('admin.dataPeminjaman.permintaan', compact('pinjambuku', 'buku', 'user', 'notifymenunggu', 'notifpengajuankembali'));
    }

    public function riwayat()
    {
        $pinjambuku = Pinjambuku::whereIn('status', ['dikembalikan', 'ditolak'])->get();

        $buku = Buku::all();
        $user = User::all();

        $notifymenunggu = Pinjambuku::where('status', 'menunggu')->count();
        $notifpengajuankembali = Pinjambuku::where('status', 'menunggu pengembalian')->count();

        return view('admin.dataPeminjaman.riwayat', compact('pinjambuku', 'buku', 'user', 'notifymenunggu', 'notifpengajuankembali'));
    }


    public function dipinjam()
    {
        $pinjambuku = Pinjambuku::where('status', 'diterima')->get();
        $buku = Buku::all();
        $user = User::all();
        $notifymenunggu = Pinjambuku::where('status', 'menunggu')->count();
        $notifpengajuankembali = Pinjambuku::where('status', 'menunggu pengembalian')->count();
        return view('admin.dataPeminjaman.daftarBukuDipinjam', compact('pinjambuku', 'buku', 'user', 'notifymenunggu', 'notifpengajuankembali'));
    }

   


}
