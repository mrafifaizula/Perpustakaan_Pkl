<?php

namespace App\Http\Controllers;

use App\Models\Pinjambuku;
use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;
use Alert;
use Auth;
use Illuminate\Http\Request;

class PinjambukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $pinjambuku = Pinjambuku::where('id_user', $user->id)->get();
    
        return view('profil.pinjambuku.index', compact('buku', 'kategori', 'penulis', 'penerbit', 'user', 'pinjambuku'));
    }

    public function create()
    {
        $pinjambuku = Pinjambuku::all();
        $buku = Buku::all();
        $user = User::all();
        return view('frontend.pinjambuku', compact('pinjambuku', 'buku', 'user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jumlah' => 'required|max:3',
            'tanggal_pinjambuku' => 'required',
            'tanggal_kembali' => 'required',
            'status' => 'required',
            'id_buku' => 'required|max:3',
            'id_user' => 'required',
        ]);
        
        $pinjambuku = new Pinjambuku();
        $pinjambuku->jumlah = $request->jumlah;
        $pinjambuku->tanggal_pinjambuku = $request->tanggal_pinjambuku;
        $pinjambuku->tanggal_kembali = $request->tanggal_kembali;
        $pinjambuku->status = $request->status;
        $pinjambuku->id_buku = $request->id_buku;
        $pinjambuku->id_user = $request->id_user;

        // minimal pinjam judul
        $user = Auth::user();
        $minimal4 = Pinjambuku::where('id_user', $user->id)->count();

        if ($minimal4 >= 5) {
            Alert::error('Gagal', 'Anda sudah meminjam maksimal 5 buku.')->autoClose(2000);
            return redirect()->back()->with(['error' => 'Anda sudah meminjam maksimal 5 buku.']);
        }
        
        // stok
        $buku = Buku::findOrFail($request->id_buku);
        
        if ($buku) {
            if ($buku->jumlah_buku >= $request->jumlah) {
                $buku->jumlah_buku -= $request->jumlah;
                $buku->save();
        
                $pinjambuku->save();
        
                Alert::success('Success', 'Buku Berhasil Dipinjam')->autoClose(1000);
                return redirect()->route('profil.pinjambuku.index');
            } else {
                Alert::error('Gagal', 'Stok buku tidak mencukupi')->autoClose(2000);
                return redirect()->back()->with('error', 'Stok buku tidak mencukupi');
            }
        } else {
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }
        
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        $pinjambuku = Pinjambuku::where('id_buku', $buku->id)->first();
        $user = User::findOrFail($id);

        return view('frontend.pinjambuku', compact('buku', 'pinjambuku', 'user'));
    }


    public function edit($id)
    {
        $pinjambuku = PinjamBuku::findOrFail($id);
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        return view('profil.pinjambuku.edit', compact('buku', 'kategori', 'penulis', 'penerbit', 'pinjambuku'));
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'status' => 'required',
    ]);

    $pinjambuku = Pinjambuku::findOrFail($id);
    $idUser = Auth::id();

    // Jika status berubah menjadi "dikembalikan"
    if ($validated['status'] === 'Kembali') {
        $buku = Buku::findOrFail($pinjambuku->id_buku);

        // Kembalikan jumlah buku yang dipinjam ke stok
        $buku->jumlah_buku += $pinjambuku->jumlah;
        $buku->save();

        // Update total pinjam untuk user
        $totalpinjam = Pinjambuku::where('id_user', $idUser)->sum('jumlah');
        $totalpinjam -= $pinjambuku->jumlah; // Kurangi total pinjam dengan jumlah buku yang dikembalikan
        
        // Jika total pinjam sudah kurang dari atau sama dengan 0, pastikan tidak bernilai negatif
        if ($totalpinjam < 0) {
            $totalpinjam = 0;
        }
    }

    // Simpan status peminjaman yang telah diperbarui
    $pinjambuku->update($validated);

    Alert::success('Success', 'Data Berhasil Diubah')->autoClose(1000);
    return redirect()->route('profil.pinjambuku.index');
}


    public function destroy(pinjambuku $pinjambuku)
    {
        //
    }
}
