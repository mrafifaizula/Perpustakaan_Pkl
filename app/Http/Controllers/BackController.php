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
        $user = User::all();
        
        return view('admin.dashboard', compact('buku', 'kategori', 'penulis','penerbit', 'user'));
    }

    public function pinjambuku()
    {
        $pinjambuku = Pinjambuku::all();
        $buku = Buku::all();
        $user = User::all();
        confirmDelete('Delete', 'Apakah Kamu Yakin?');
        return view('admin.pinjambuku.index', compact('pinjambuku', 'buku', 'user'));
    }

}
