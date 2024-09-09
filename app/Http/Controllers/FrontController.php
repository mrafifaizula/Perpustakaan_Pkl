<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\User;
use App\Models\Pinjambuku;
use Auth;
use App\Http\Controllers\Users;
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
        return view('frontend.index', compact('buku', 'kategori', 'penulis','penerbit', 'user'));
    }

    public function perpustakaan()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $user = User::all();
        return view('profil.dashboard', compact('buku', 'kategori', 'penulis','penerbit','user'));
    }

    public function detailbuku()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $pinjambuku = pinjambuku::all();
        return view('frontend.detailbuku', compact('buku', 'kategori', 'penulis','penerbit','pinjambuku'));
    }

    public function ShowPinjambuku($id)
    {
        $buku = Buku::findOrFail($id);
        $pinjambuku = Pinjambuku::where('id_buku', $buku->id)->first();
        $user = User::findOrFail($id);

        return view('frontend.pinjambuku', compact('buku', 'pinjambuku', 'user'));
    }
    
}
