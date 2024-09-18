<?php

namespace App\Http\Controllers;
use Alert;
use Validator;
use App\Models\Pinjambuku;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
   
    public function index()
    {
        $penerbit = Penerbit::all();
        $notifymenunggu = Pinjambuku::where('status', 'menunggu')->count();
        $notifpengajuankembali = Pinjambuku::where('status', 'menunggu pengembalian')->count();

        confirmDelete('Delete', 'Apakah Kamu Yakin?');
        return view('admin.penerbit.index', compact('penerbit', 'notifymenunggu', 'notifpengajuankembali'));
    }

   
    public function create()
    {
        $notifymenunggu = Pinjambuku::where('status', 'menunggu')->count();
        $notifpengajuankembali = Pinjambuku::where('status', 'menunggu pengembalian')->count();
   
        return view('admin.penerbit.create', compact('notifymenunggu','notifpengajuankembali'));
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_penerbit' => 'required|unique:penerbits,nama_penerbit',
        ], [
            'nama_penerbit.required' => 'Nama Penerbit Harus Diisi',
            'nama_penerbit.unique' => 'Nama Penerbit Tidak Boleh Sama'
        ]);

        // validator nama penerbit tidak boleh sama pake alert
        if ($validator->fails()) {
            $errors = $validator->errors()->first('nama_penerbit');
            Alert::error('Gagal', 'Gagal ' . $errors)->autoClose(2000);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $penerbit = new Penerbit();
        $penerbit->nama_penerbit = $request->nama_penerbit;
        $penerbit->save();

        Alert::success('Success', 'Data Berhasil Disimpan')->autoClose(1000);
        return redirect()->route('penerbit.index');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $notifymenunggu = Pinjambuku::where('status', 'menunggu')->count();
        $notifpengajuankembali = Pinjambuku::where('status', 'menunggu pengembalian')->count();
   
        return view('admin.penerbit.edit', compact('penerbit', 'notifymenunggu', 'notifpengajuankembali'));
    }

   
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_penerbit' => 'required',
        ], [
            'nama_penerbit.required' => 'Nama Penerbit Harus Diisi',
        ]);

        // validator nama penerbit tidak boleh sama pake alert
        if ($validator->fails()) {
            $errors = $validator->errors()->first('nama_penerbit');
            Alert::error('Gagal', 'Gagal ' . $errors)->autoClose(2000);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $penerbit = Penerbit::findOrFail($id);
        $penerbit->nama_penerbit = $request->nama_penerbit;

        $penerbit->save();
        Alert::success('Success', 'Data Berhasil Diubah')->autoClose(1000);
        return redirect()->route('penerbit.index');
    }

    
    public function destroy($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();
        Alert::success('Success', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('penerbit.index');
    }
}
