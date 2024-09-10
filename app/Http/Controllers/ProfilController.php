<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\User;
use App\Models\Pinjambuku;
use Auth;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
   
    public function index()
    {
        $profil = Profil::all();
        $user = User::all();
        $idUser = Auth::id();
        $totalpinjam = Pinjambuku::where('id_user', $idUser)->sum('jumlah');
        confirmDelete('Delete', 'Apakah Kamu Yakin?');
        return view('profil.profil.index', compact('profil', 'user', 'totalpinjam'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        //
    }

    public function show(profil $profil)
    {
        //
    }

    public function edit(profil $profil)
    {
        //
    }

    public function update(Request $request, profil $profil)
    {
        //
    }

    public function destroy(profil $profil)
    {
        //
    }
}
