<?php

namespace App\Http\Controllers;
use Alert;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    
    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $pinjaman = Pinjaman::all();
        confirmDelete('Delete', 'Apakah Kamu Yakin?');
        return view('admin.buku.index', compact('buku', 'kategori', 'penulis', 'penerbit', 'pinjaman'));
    }

   
    public function create()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $pinjaman = Pinjaman::all();
        return view('admin.buku.create', compact('buku', 'kategori', 'penulis', 'penerbit', 'pinjaman'));
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|unique:bukus,judul',
            'jumlah_buku' => 'required',
            'tahun_terbit' => 'required|date|before_or_equal:today',
            'desc_buku' => 'required',
            'id_kategori' => 'required',
            'id_penulis' => 'required',
            'id_penerbit' => 'required',
            'image_buku' => 'required|max:4000|mimes:jpeg,png,jpg,gif,svg',
        ],
        
        [
            'judul.required' => 'Nama Judul Harus Diisi',
            'judul.unique' => 'Judul Tidak Boleh Sama',
            'tahun_terbit.after_or_equal' => 'Tanggal harus sama dengan atau setelah hari ini.',
        ]);

        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->jumlah_buku = $request->jumlah_buku;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->desc_buku = $request->desc_buku;
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

    
    public function show($id)
    {
        $buku = Buku::findorfail($id);
        return view('detailbuku', compact('buku'));
    }

    
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        return view('admin.buku.edit', compact('buku', 'kategori', 'penulis', 'penerbit'));
    }

    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'jumlah_buku' => 'required',
            'tahun_terbit' => 'required|date',
            'desc_buku' => 'required',
            'id_kategori' => 'required',
            'id_penulis' => 'required',
            'id_penerbit' => 'required',
            // 'image_buku' => 'required|max:4000|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->jumlah_buku = $request->jumlah_buku;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->desc_buku = $request->desc_buku;
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
        $buku = Buku::findOrFail($id);
        $buku->delete();
        Alert::success('Success', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('buku.index');
    }
}
