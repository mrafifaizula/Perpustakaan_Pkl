<?php

namespace App\Http\Controllers;

use App\Models\pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pinjaman = pinjaman::latest()->paginate(5);
        return view('perpustakaan', compact('pinjaman'));
    }

    public function create()
    {
        $buku = buku::all();
        $pinjaman = pinjaman::all();
        $kembali = kembali::all();
        return view('perpustakaan', compact('buku','pinjaman','kembali'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jumlah' => 'required|min:1|max:5',
            'tanggal_pinjaman' => 'required|date',
            'nama' => 'required',
            'status' => 'required',
            'id_buku' => 'required',
        ]);

        // Create a new instance of pinjaman
        $pinjaman = new pinjaman();
        $pinjaman->jumlah = $request->jumlah;
        $pinjaman->tanggal_pinjaman = $request->tanggal_pinjaman;
        $pinjaman->nama = $request->nama;
        $pinjaman->status = $request->status;
        $pinjaman->id_buku = $request->id_buku;

        // Attempt to find the associated Data record
        $buku = Buku::findOrFail($request->id_buku);

        // Check if Data record was found
        if ($buku) {
            // Update stok in Data record
            $buku->jumlah_buku -= $request->jumlah;
            $buku->save();

            // Save the pinjaman record
            $pinjaman->save();

            // Redirect to the index route of pinjaman
            return redirect()->route('peminjaman.index');
        } else {
            // Handle the case where Data record was not found
            // For example, you can redirect back with an error message
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }
    }

    public function show(pinjaman $pinjaman)
    {
        
    }

    public function edit(pinjaman $pinjaman)
    {
        $pinjaman = pinjaman::findOrFail($id);
        $buku = Buku::all();
        return view('peminjaman.edit', compact('pinjaman','buku'));
    }

    public function update(Request $request, pinjaman $pinjaman)
    {
        $pinjaman = pinjaman::findOrFail($id);
        $buku = Buku::findOrFail($pinjaman->id_buku);

        $pinjaman->update($request->all());

        if ($buku->jumlah_buku < $request->jumlah) {
            Alert::warning('Warning', 'Jumlah buku Tidak Cukup')->autoClose(1500);
            return redirect()->route('peminjaman.index');
        } else {
            $buku->jumlah_buku += $pinjaman->jumlah;
            $buku->jumlah_buku -= $request->jumlah;
            $buku->save();
        }

        if ($request->status == "Sudah Dikembalikan") {
            $buku->jumlah_buku += $pinjaman->jumlah;
            $buku->save();
        }
        $pinjaman->save();
        Alert::success('Success', 'Data Berhasil Diubah')->autoclose(1500);
        return redirect()->route('peminjaman.index');
    }

    public function destroy(pinjaman $pinjaman)
    {
        //
    }
}
