<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\User;
use App\Models\Pinjambuku;
use Auth;

class FrontController extends Controller
{

    // halaman utama

    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $user = User::all();
        $user = Auth::user();
        $pinjambuku = Pinjambuku::all();

        return view('frontend.index', compact('buku', 'kategori', 'penulis', 'penerbit', 'user', 'pinjambuku'));
    }

    public function detailbuku()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $pinjambuku = pinjambuku::all();
        return view('frontend.detailbuku', compact('buku', 'kategori', 'penulis', 'penerbit', 'pinjambuku'));
    }

    public function ShowPinjambuku($id)
    {
        $buku = Buku::findOrFail($id);
        $pinjambuku = Pinjambuku::where('id_buku', $buku->id)->first();
        $user = Auth::user(); // Get the authenticated user

        $notifications = Pinjambuku::where('id_user', $user->id) // Filter by user ID
            ->whereIn('status', [
                'menunggu pengembalian',
                'diterima',
                'ditolak',
                'pengembalian ditolak',
                'dikembalikan'
            ])
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();


        return view('frontend.pinjambuku', compact('buku', 'pinjambuku', 'user', 'notifications'));
    }



    // profile

    public function perpustakaan()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $user = User::all();
        $idUser = Auth::id();
        $totalpinjam = Pinjambuku::where('id_user', $idUser)->sum('jumlah');
        $notifications = Pinjambuku::whereIn('status', ['menunggu pengembalian', 'diterima', 'ditolak', 'pengembalian ditolak', 'dikembalikan'])
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return view('profil.dashboard', compact('buku', 'kategori', 'penulis', 'penerbit', 'user', 'totalpinjam', 'notifications'));
    }

    public function daftarbuku()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $notifications = Pinjambuku::whereIn('status', ['menunggu pengembalian', 'diterima', 'ditolak', 'pengembalian ditolak', 'dikembalikan'])
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return view('profil.pinjambuku.index', compact('buku', 'kategori', 'notifications'));
    }

    public function showbukuprofil($id)
    {
        $buku = Buku::findorfail($id);
        $pinjambuku = Pinjambuku::all();
        $notifications = Pinjambuku::whereIn('status', ['menunggu pengembalian', 'diterima', 'ditolak', 'pengembalian ditolak', 'dikembalikan'])
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return view('profil.pinjambuku.show', compact('buku', 'pinjambuku', 'notifications'));
    }

    public function pinjambukuprofil()
    {
        $pinjambuku = Pinjambuku::all();
        $buku = Buku::all();
        $user = User::all();
        return view('profil.pinjambuku.create', compact('pinjambuku', 'buku', 'user'));
    }

    public function profil()
    {
        $user = Auth::user();
        $notifications = Pinjambuku::whereIn('status', ['menunggu pengembalian', 'diterima', 'ditolak', 'pengembalian ditolak', 'dikembalikan'])
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return view('profil.profil', compact('user', 'notifications'));
    }

}
