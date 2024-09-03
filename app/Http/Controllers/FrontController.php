<?php

namespace App\Http\Controllers;
use App\Models\buku;
use App\Models\kategori;
use App\Models\penulis;
use App\Models\penerbit;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $buku = buku::all();
        $kategori = kategori::all();
        $penulis = penulis::all();
        $penerbit = penerbit::all();
        return view('admin.dashboard', compact('buku', 'kategori', 'penulis','penerbit'));
    }

    public function dashboard()
    {
        $buku = buku::all();
        $kategori = kategori::all();
        $penulis = penulis::all();
        $penerbit = penerbit::all();
        return view('admin.dashboard', compact('buku', 'kategori', 'penulis','penerbit'));
    }

    public function perpustakaan()
    {
        $buku = buku::all();
        return view('perpustakaan', compact('buku'));
    }
}