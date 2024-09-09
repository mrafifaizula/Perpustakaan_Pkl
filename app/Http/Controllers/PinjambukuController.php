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
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
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
            'id_buku' => 'required',
            'id_user' => 'required',
        ]);
        
        $pinjambuku = new Pinjambuku();
        $pinjambuku->jumlah = $request->jumlah;
        $pinjambuku->tanggal_pinjambuku = $request->tanggal_pinjambuku;
        $pinjambuku->tanggal_kembali = $request->tanggal_kembali;
        $pinjambuku->status = $request->status;
        $pinjambuku->id_buku = $request->id_buku;
        $pinjambuku->id_user = $request->id_user;
        
        $buku = Buku::findOrFail($request->id_buku);
        
        if ($buku) {
            // Check if there's enough stock
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
        $pinjambuku->update($validated);
        $pinjambuku->save();

        Alert::success('Success', 'Data Berhasil Diubah')->autoClose(1000);
        return redirect()->route('profil.pinjambuku.index');
    }

    public function destroy(pinjambuku $pinjambuku)
    {
        //
    }
}
