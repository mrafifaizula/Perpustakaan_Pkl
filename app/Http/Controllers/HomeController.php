<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;
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
        $user = Auth::user();
        // dd($user->, $user);


    // Fetch data from the models
    $buku = Buku::all();
    $kategori = Kategori::all();
    $penulis = Penulis::all();
    $penerbit = Penerbit::all();

    $users = Auth::user();
    if ($users->isAdmin == 1) {
        return view('admin.dashboard', compact('buku', 'kategori', 'penulis', 'penerbit'));
    } else {
        return view('frontend.index', compact('buku', 'kategori', 'penulis', 'penerbit'));
    }
    return view('frontend.index', compact('buku', 'kategori', 'penulis', 'penerbit'));


}
}
