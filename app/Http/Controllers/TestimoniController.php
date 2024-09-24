<?php

namespace App\Http\Controllers;
use Auth;
use Alert;
use App\Models\testimoni;
use App\Models\pinjambuku;
use App\Models\notification;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{

    public function index()
    {

    }


    public function create($id)
    {
        $pinjambuku = pinjambuku::with('buku')->findOrFail($id);
        $user = Auth::user();
        $idUser = Auth::id();

        $notification = notification::where('id_user', $idUser)
            ->where('read', false)  // Hanya ambil notifikasi yang belum dibaca
            ->orderBy('created_at', 'desc')
            ->get();

            
        return view('profil.testimoni', compact('pinjambuku', 'user', 'notification'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_pinjambuku' => 'required|exists:pinjambukus,id', // Ubah 'pinjambuku' menjadi 'pinjambukus'
            'testimoni' => 'required|string|max:255',
            'penilaian' => 'required|integer|min:1|max:5',
        ]);

        Testimoni::create([
            'id_user' => Auth::id(),
            'id_pinjambuku' => $request->id_pinjambuku, // Pastikan ini ada
            'testimoni' => $request->testimoni,
            'penilaian' => $request->penilaian,
        ]);

        Alert::success('Success', 'Testimoni Berhasil Dikirim')->autoClose(1000);
        return redirect()->route('profil.testimoni')->with('success', 'Testimoni berhasil disimpan.');
    }



    public function show(testimoni $testimoni)
    {
        //
    }


    public function edit(testimoni $testimoni)
    {
        //
    }


    public function update(Request $request, testimoni $testimoni)
    {
        //
    }


    public function destroy(testimoni $testimoni)
    {
        //
    }
}