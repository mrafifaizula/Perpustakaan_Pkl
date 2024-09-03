<?php

namespace App\Http\Controllers;
use Alert;
use App\Models\penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
   
    public function index()
    {
        $penerbit = penerbit::all();
        confirmDelete('Delete', 'Apakah Kamu Yakin?');
        return view('admin.penerbit.index', compact('penerbit'));
    }

   
    public function create()
    {
        return view('admin.penerbit.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penerbit' => 'required|unique:penerbits,nama_penerbit',
        ],
    
        [
            'nama_penerbit.required' => 'Nama Penerbit Harus Diisi',
            'nama_penerbit.unique' => 'Nama Penerbit Tidak Boleh Sama'
        ]);

        // new object
        $penerbit = new penerbit();
        $penerbit->nama_penerbit = $request->nama_penerbit;
        $penerbit->save();

        Alert::success('Success', 'Data Berhasil Disimpan')->autoClose(1000);
        return redirect()->route('penerbit.index');
    }

    
    public function show(penerbit $penerbit)
    {
        //
    }

    
    public function edit($id)
    {
        $penerbit = penerbit::findOrFail($id);
        return view('admin.penerbit.edit', compact('penerbit'));
    }

   
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_penerbit' => 'required|unique:penerbits,nama_penerbit',
        ],
        [
            'nama_penerbit.required' => 'Nama Penerbit Harus Diisi',
            'nama_penerbit.unique' => 'Nama Penerbit Tidak Boleh Sama'
        ]);

        $penerbit = penerbit::findOrFail($id);
        $penerbit->nama_penerbit = $request->nama_penerbit;

        $penerbit->save();
        Alert::success('Success', 'Data Berhasil Diubah')->autoClose(1000);
        return redirect()->route('penerbit.index');
    }

    
    public function destroy($id)
    {
        $penerbit = penerbit::findOrFail($id);
        $penerbit->delete();
        Alert::success('Success', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('penerbit.index');
    }
}