<?php

namespace App\Http\Controllers;
use Alert;
use App\Models\Pinjaman;
use App\Models\Kembali;
use App\Models\Buku;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pinjaman = Pinjaman::latest()->paginate(5);
        return view('detailbuku', compact('pinjaman'));
    }

    public function create()
    {
        $buku = Buku::all();
        $pinjaman = Pinjaman::all();
        $kembali = Kembali::all();
        return view('detailbuku', compact('buku','pinjaman','kembali'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jumlah' => 'required|min:1|max:5',
            'tanggal_pinjaman' => 'required|date||before_or_equal:today',
            'tanggal_kembali' => 'required|date|after_or_equal:today',
            'nama' => 'required',
            'status' => 'required',
            'id_buku' => 'required',
        ]);

        // Create a new instance of pinjaman
        $pinjaman = new Pinjaman();
        $pinjaman->jumlah = $request->jumlah;
        $pinjaman->tanggal_pinjaman = $request->tanggal_pinjaman;
        $pinjaman->tanggal_kembali = $request->tanggal_kembali;
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
            return redirect()->route('pinjaman');
        } else {
            // Handle the case where Data record was not found
            // For example, you can redirect back with an error message
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $buku = Buku::all();
        return view('peminjaman.edit', compact('pinjaman','buku'));
    }

    public function update(Request $request, pinjaman $pinjaman)
    {
        $pinjaman = Pinjaman::findOrFail($id);
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
