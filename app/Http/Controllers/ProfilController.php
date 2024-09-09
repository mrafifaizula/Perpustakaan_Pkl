<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
   
    public function index()
    {
        $profil = Profil::all();
        $user = User::all();
        confirmDelete('Delete', 'Apakah Kamu Yakin?');
        return view('profil.profil.index', compact('profil', 'user'));
    }

    public function create()
    {
        //
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
