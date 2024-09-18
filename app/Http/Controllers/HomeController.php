<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\Pinjambuku;
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
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $totalbuku = Buku::sum('jumlah_buku');
        $idUser = Auth::id();
        $notifymenunggu = Pinjambuku::where('status', 'menunggu')->count();
        $notifpengajuankembali = Pinjambuku::where('status', 'menunggu pengembalian')->count();
        $totalpinjam = Pinjambuku::where('id_user', $idUser)->sum('jumlah');

        // Fetch notifications for dropdown
        $notifications = Pinjambuku::whereIn('status', ['menunggu pengembalian', 'diterima', 'ditolak'])
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();


        $users = Auth::user();
        if ($users->isAdmin == 1) {
            return view('admin.dashboard', compact('buku', 'kategori', 'penulis', 'penerbit', 'totalbuku', 'totalpinjam', 'notifymenunggu', 'notifpengajuankembali', 'notifications'));
        } else {
            return view('profil.dashboard', compact('buku', 'kategori', 'penulis', 'penerbit', 'totalbuku', 'totalpinjam', 'notifymenunggu', 'notifpengajuankembali', 'notifications'));
        }
        return view('profil.dashboard', compact('buku', 'kategori', 'penulis', 'penerbit', 'totalbuku', 'totalpinjam', 'notifymenunggu', 'notifpengajuankembali', 'notifications'));


    }
}
