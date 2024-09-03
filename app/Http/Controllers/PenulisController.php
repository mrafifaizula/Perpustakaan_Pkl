<?php

namespace App\Http\Controllers;
use Alert;
use App\Models\penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    
    public function index()
    {
        $penulis = penulis::all();
        confirmDelete('Delete', 'Apakah Kamu Yakin?');
        return view('admin.penulis.index', compact('penulis'));
    }

    
    public function create()
    {
        return view('admin.penulis.create');
    }

  
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penulis' => 'required|unique:penulis,nama_penulis',
        ],

        [
            'nama_penulis.required' => 'Nama Penulis Harus Diisi',
            'nama_penulis.unique' => 'Nama Penulis Tidak Boleh Sama'
        ]);

        // new object
        $penulis = new penulis();
        $penulis->nama_penulis = $request->nama_penulis;
        $penulis->save();

        Alert::success('Success', 'Data Berhasil Disimpan')->autoClose(1000);
        return redirect()->route('penulis.index');
    }

   
    public function show(penulis $penulis)
    {
        //
    }

   
    public function edit($id)
    {
        $penulis = penulis::findOrFail($id);
        return view('admin.penulis.edit', compact('penulis'));
    }

    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_penulis' => 'required|unique:penulis,nama_penulis',
        ],
    
        [
            'nama_penulis.required' => 'Nama nama_penulis Harus Diisi',
            'nama_penulis.unique' => 'Nama Penulis Tidak Boleh Sama'
        ]);

        $penulis = penulis::findOrFail($id);
        $penulis->nama_penulis = $request->nama_penulis;

        $penulis->save();
        Alert::success('Success', 'Data Berhasil Diubah')->autoClose(1000);
        return redirect()->route('penulis.index');
    }

    
    public function destroy($id)
    {
        $penulis = penulis::findOrFail($id);
        $penulis->delete();
        Alert::success('Success', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('penulis.index');
    }
}
