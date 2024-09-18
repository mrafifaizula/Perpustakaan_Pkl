<?php

namespace App\Http\Controllers;
use Alert;
use Validator;
use App\Models\Penulis;
use App\Models\Pinjambuku;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    
    public function index()
    {
        $penulis = Penulis::all();
        $notifymenunggu = Pinjambuku::where('status', 'menunggu')->count();
        $notifpengajuankembali = Pinjambuku::where('status', 'menunggu pengembalian')->count();

        confirmDelete('Delete', 'Apakah Kamu Yakin?');
        return view('admin.penulis.index', compact('penulis', 'notifymenunggu', 'notifpengajuankembali'));
    }

    
    public function create()
    {
        $notifymenunggu = Pinjambuku::where('status', 'menunggu')->count();
        $notifpengajuankembali = Pinjambuku::where('status', 'menunggu pengembalian')->count();

        return view('admin.penulis.create', compact('notifymenunggu','notifpengajuankembali'));
    }

  
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_penulis' => 'required|unique:penulis,nama_penulis',
        ], [
            'nama_penulis.required' => 'Nama Penulis Harus Diisi',
            'nama_penulis.unique' => 'Nama Penulis Tidak Boleh Sama'
        ]);

        // validator nama penulis tidak boleh sama pake alert
        if ($validator->fails()) {
            $errors = $validator->errors()->first('nama_penulis');
            Alert::error('Gagal', 'Gagal ' . $errors)->autoClose(2000);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // new object
        $penulis = new Penulis();
        $penulis->nama_penulis = $request->nama_penulis;
        $penulis->save();

        Alert::success('Success', 'Data Berhasil Disimpan')->autoClose(1000);
        return redirect()->route('penulis.index');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $notifymenunggu = Pinjambuku::where('status', 'menunggu')->count();
        $notifpengajuankembali = Pinjambuku::where('status', 'menunggu pengembalian')->count();

        $penulis = Penulis::findOrFail($id);
        return view('admin.penulis.edit', compact('penulis', 'notifymenunggu', 'notifpengajuankembali'));
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_penulis' => 'required',
        ], [
            'nama_penulis.required' => 'Nama Penulis Harus Diisi',
        ]);

        // validator nama penulis tidak boleh sama pake alert
        if ($validator->fails()) {
            $errors = $validator->errors()->first('nama_penulis');
            Alert::error('Gagal', 'Gagal ' . $errors)->autoClose(2000);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $penulis = Penulis::findOrFail($id);
        $penulis->nama_penulis = $request->nama_penulis;

        $penulis->save();
        Alert::success('Success', 'Data Berhasil Diubah')->autoClose(1000);
        return redirect()->route('penulis.index');
    }

    
    public function destroy($id)
    {
        $penulis = Penulis::findOrFail($id);
        $penulis->delete();
        Alert::success('Success', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('penulis.index');
    }
}
