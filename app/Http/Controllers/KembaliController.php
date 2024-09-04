<?php

namespace App\Http\Controllers;

use App\Models\kembali;
use Illuminate\Http\Request;

class KembaliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kembali = Minjem::where('status', 'Sudah Dikembalikan')->get();

        foreach ($kembali as $data) {
            $data->formatted_tanggal = Carbon::parse($data->tanggal_kembali)->translatedFormat('l, d F Y');
        }

        return view('kembalian.index', compact('kembali'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(kembali $kembali)
    {
        //
    }

    public function edit(kembali $kembali)
    {
        //
    }

    public function update(Request $request, kembali $kembali)
    {
        //
    }

    public function destroy(kembali $kembali)
    {
        //
    }
}
