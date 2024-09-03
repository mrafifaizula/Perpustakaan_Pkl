<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\buku;
use App\Models\kategori;
use App\Models\penulis;
use App\Models\penerbit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = Auth::user();
        if ($users->isAdmin == 1) {
            $buku = buku::all();
            $kategori = kategori::all();
            $penulis = penulis::all();
            $penerbit = penerbit::all();
            return view('admin.dashboard', compact('buku', 'kategori', 'penulis', 'penerbit'));
        } else {
            return view('perpustakaan');
        }
        $buku = buku::all();
        $kategori = kategori::all();
        $penulis = penulis::all();
        $penerbit = penerbit::all();
        return view('perpustakaan', compact('buku', 'kategori', 'penulis', 'penerbit'));
    }
}
