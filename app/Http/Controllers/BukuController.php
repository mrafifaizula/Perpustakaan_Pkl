<?php

namespace App\Http\Controllers;
use Alert;
use App\Models\buku;
use App\Models\kategori;
use App\Models\penulis;
use App\Models\penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    
    public function index()
    {
        $buku = buku::all();
        $kategori = kategori::all();
        $penulis = penulis::all();
        $penerbit = penerbit::all();
        confirmDelete('Delete', 'Apakah Kamu Yakin?');
        return view('admin.buku.index', compact('buku', 'kategori', 'penulis', 'penerbit'));
    }

   
    public function create()
    {
        $buku = buku::all();
        $kategori = kategori::all();
        $penulis = penulis::all();
        $penerbit = penerbit::all();
        return view('admin.buku.create', compact('buku', 'kategori', 'penulis', 'penerbit'));
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|unique:bukus,judul',
            'jumlah_buku' => 'required',
            'tahun_terbit' => 'required',
            'id_kategori' => 'required',
            'id_penulis' => 'required',
            'id_penerbit' => 'required',
            'image_buku' => 'required|max:4000|mimes:jpeg,png,jpg,gif,svg',
        ],
        
        [
            'judul.required' => 'Nama Judul Harus Diisi',
            'judul.unique' => 'Judul Tidak Boleh Sama'
        ]);

        $buku = new buku();
        $buku->judul = $request->judul;
        $buku->jumlah_buku = $request->jumlah_buku;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->id_kategori = $request->id_kategori;
        $buku->id_penulis = $request->id_penulis;
        $buku->id_penerbit = $request->id_penerbit;

        if ($request->hasFile('image_buku')) {
            $img = $request->file('image_buku');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku/', $name);
            $buku->image_buku = $name;
        }

        $buku->save();
        Alert::success('Success', 'Data Berhasil Disimpan')->autoClose(1000);
        return redirect()->route('buku.index');
    }

    
    public function show(buku $buku)
    {
        //
    }

    
    public function edit($id)
    {
        $buku = buku::findOrFail($id);
        $kategori = kategori::all();
        $penulis = penulis::all();
        $penerbit = penerbit::all();
        return view('admin.buku.edit', compact('buku', 'kategori', 'penulis', 'penerbit'));
    }

    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|unique:bukus,judul',
            'jumlah_buku' => 'required',
            'tahun_terbit' => 'required',
            'id_kategori' => 'required',
            'id_penulis' => 'required',
            'id_penerbit' => 'required',
            // 'image_buku' => 'required|max:4000|mimes:jpeg,png,jpg,gif,svg',
        ],

        [
            'judul.required' => 'Nama Judul Harus Diisi',
            'judul.unique' => 'Judul Tidak Boleh Sama'
        ]);

        $buku = buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->jumlah_buku = $request->jumlah_buku;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->id_kategori = $request->id_kategori;
        $buku->id_penulis = $request->id_penulis;
        $buku->id_penerbit = $request->id_penerbit;

        if ($request->hasFile('image_buku')) {
            $buku->deleteImage(); // untuk hapus gambar sebelum diganti gambar baru
            $img = $request->file('image_buku');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku/', $name);
            $buku->image_buku = $name;
        }

        $buku->save();
        Alert::success('Success', 'Data Berhasil Diubah')->autoClose(1000);
        return redirect()->route('buku.index');
    }

    
    public function destroy($id)
    {
        $buku = buku::findOrFail($id);
        $buku->delete();
        Alert::success('Success', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('buku.index');
    }
}
