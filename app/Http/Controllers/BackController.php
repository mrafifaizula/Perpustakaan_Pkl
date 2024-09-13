<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\User;
use App\Models\Pinjambuku;
use Auth;
use Illuminate\Http\Request;

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
        
        return view('admin.dashboard', compact('buku', 'kategori', 'penulis','penerbit', 'user'));
    }

    public function pinjambuku()
    {
        $pinjambuku = Pinjambuku::where('status', 'menunggu')->get();
        $buku = Buku::all();
        $user = User::all();
        return view('admin.pinjambuku.index', compact('pinjambuku', 'buku', 'user'));
    }

    public function dikembalikan()
    {
        $pinjambuku = Pinjambuku::where('status', 'dikembalikan')->get();
        $buku = Buku::all();
        $user = User::all();
        return view('admin.pinjambuku.dikembalikan', compact('pinjambuku', 'buku', 'user'));
    }

    public function dipinjam()
    {
        $pinjambuku = Pinjambuku::where('status', 'diterima')->get();
        $buku = Buku::all();
        $user = User::all();
        return view('admin.pinjambuku.dipinjam', compact('pinjambuku', 'buku', 'user'));
    }

    public function pengajuankembali()
    {
        $pinjambuku = Pinjambuku::where('status', 'menunggu pengembalian')->get();
        $buku = Buku::all();
        $user = User::all();
        return view('admin.pinjambuku.pengajuankembali', compact('pinjambuku', 'buku', 'user'));
    }

}
