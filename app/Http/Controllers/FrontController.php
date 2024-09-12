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

    // halaman utama

    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $user = User::all();
        $user = Auth::user();
        $totalbuku = Buku::sum('jumlah_buku');
        return view('frontend.index', compact('buku', 'kategori', 'penulis','penerbit', 'user','totalbuku'));
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
        $user = auth()->user();

        return view('frontend.pinjambuku', compact('buku', 'pinjambuku', 'user'));
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
        return view('profil.dashboard', compact('buku', 'kategori', 'penulis','penerbit','user', 'totalpinjam'));
    }

    public function daftarbuku()
    {
        $buku = Buku::all(); 
        $kategori = Kategori::all(); 

        return view('profil.pinjambuku.index', compact('buku','kategori'));
    }

    public function showbukuprofil($id)
    {
        $buku = Buku::findorfail($id);
        $pinjambuku = Pinjambuku::all();
        return view('profil.pinjambuku.show', compact('buku','pinjambuku'));
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
    
        return view('profil.profil', compact('user'));
    }

}
