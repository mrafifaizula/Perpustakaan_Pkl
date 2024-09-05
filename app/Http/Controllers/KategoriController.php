<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Kategori;
use App\Models\Buku;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
   
    public function index()
    {
        $kategori = Kategori::all();
        $buku = Buku::all();
        confirmDelete('Delete', 'Apakah Kamu Yakin?');
        return view('admin.kategori.index', compact('kategori', 'buku'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|unique:kategoris,nama_kategori',
        ],

        [
            'nama_kategori.required' => 'Nama Kategori Harus Diisi',
            'nama_kategori.unique' => 'Nama Kategori Tidak Boleh Sama'
        ]);

        // new object
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        Alert::success('Success', 'Data Berhasil Disimpan')->autoClose(1000);
        return redirect()->route('kategori.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required',
        ],);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;

        $kategori->save();
        Alert::success('Success', 'Data Berhasil Diubah')->autoClose(1000);
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        Alert::success('Success', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('kategori.index');
    }
}
