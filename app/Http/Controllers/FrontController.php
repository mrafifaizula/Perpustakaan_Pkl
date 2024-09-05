<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\User;

use Flowframe\Trend\TrendValue;
use Filament\Widgets\LineChartWidget;
// use App\Models\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $user = User::all();
        return view('admin.dashboard', compact('buku', 'kategori', 'penulis','penerbit', 'user'));
    }

    // public function dashboard()
    // {
    //     $buku = buku::all();
    //     $kategori = kategori::all();
    //     $penulis = penulis::all();
    //     $penerbit = penerbit::all();
    //     return view('admin.dashboard', compact('buku', 'kategori', 'penulis','penerbit'));
    // }

    public function perpustakaan()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        return view('perpustakaan', compact('buku', 'kategori', 'penulis','penerbit'));
    }

    
}
