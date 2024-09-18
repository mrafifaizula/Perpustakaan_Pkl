<?php

namespace App\Http\Controllers;
use Validator;
use Alert;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\Pinjambuku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    
    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $pinjambuku = Pinjambuku::all();
        $notifymenunggu = Pinjambuku::where('status', 'menunggu')->count();
        $notifpengajuankembali = Pinjambuku::where('status', 'menunggu pengembalian')->count();

        return view('admin.buku.index', compact('kategori', 'penulis', 'penerbit', 'pinjambuku', 'buku', 'notifymenunggu', 'notifpengajuankembali'));

    }

   
    public function create()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $pinjambuku = Pinjambuku::all();
        $notifymenunggu = Pinjambuku::where('status', 'menunggu')->count();
        $notifpengajuankembali = Pinjambuku::where('status', 'menunggu pengembalian')->count();

        return view('admin.buku.create', compact('buku', 'kategori', 'penulis', 'penerbit', 'pinjambuku', 'notifymenunggu', 'notifpengajuankembali'));
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'judul' => 'required|unique:bukus,judul',
            'jumlah_buku' => 'required',
            'tahun_terbit' => 'required|date',
            'desc_buku' => 'required',
            'code_buku' => 'required',
            'id_kategori' => 'required',
            'id_penulis' => 'required',
            'id_penerbit' => 'required',
            'image_buku' => 'required|max:4000|mimes:jpeg,png,jpg,gif,svg',
        ],
        
        [
            'judul.required' => 'Judul Buku Harus Diisi',
            'judul.unique' => 'Judul Buku Tidak Boleh Sama',
        ]);

        // validator judul buku tidak boleh sama pake alert
        if ($validator->fails()) {
            $errors = $validator->errors()->first('judul');
            Alert::error('Gagal', 'Gagal ' . $errors)->autoClose(2000);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->jumlah_buku = $request->jumlah_buku;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->desc_buku = $request->desc_buku;
        $buku->code_buku = $request->code_buku;
        $buku->id_kategori = $request->id_kategori;
        $buku->id_penulis = $request->id_penulis;
        $buku->id_penerbit = $request->id_penerbit;

        if ($request->hasFile('image_buku')) {
            $img = $request->file('image_buku');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku/', $name);
            $buku->image_buku = $name;
        }

        $buku->save();
        Alert::success('Success', 'Data Berhasil Disimpan')->autoClose(1000);
        return redirect()->route('buku.index');
    }

    
    public function show($id)
    {
        $buku = Buku::findorfail($id);
        $pinjambuku = Pinjambuku::all();
        $notifymenunggu = Pinjambuku::where('status', 'menunggu')->count();
        $notifpengajuankembali = Pinjambuku::where('status', 'menunggu pengembalian')->count();
        return view('frontend.detailbuku', compact('buku','pinjambuku', 'notifymenunggu', 'notifpengajuankembali'));
    }

    
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        return view('admin.buku.edit', compact('buku', 'kategori', 'penulis', 'penerbit'));
    }

    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'judul' => 'required',
            'jumlah_buku' => 'required',
            'tahun_terbit' => 'required|date',
            'desc_buku' => 'required',
            'code_buku' => 'required',
            'id_kategori' => 'required',
            'id_penulis' => 'required',
            'id_penerbit' => 'required',
            // 'image_buku' => 'required|max:4000|mimes:jpeg,png,jpg,gif,svg',
        ],
        
        [
            'judul.required' => 'Judul buku Harus Diisi',
        ]);

        // validator judul buku tidak boleh sama pake alert
        if ($validator->fails()) {
            $errors = $validator->errors()->first('judul');
            Alert::error('Gagal', 'Gagal ' . $errors)->autoClose(2000);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $buku = Buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->jumlah_buku = $request->jumlah_buku;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->desc_buku = $request->desc_buku;
        $buku->code_buku = $request->code_buku;
        $buku->id_kategori = $request->id_kategori;
        $buku->id_penulis = $request->id_penulis;
        $buku->id_penerbit = $request->id_penerbit;

        if ($request->hasFile('image_buku')) {
            $buku->deleteImage(); // untuk hapus gambar sebelum diganti gambar baru
            $img = $request->file('image_buku');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku/', $name);
            $buku->image_buku = $name;
        }

        $buku->save();
        Alert::success('Success', 'Data Berhasil Diubah')->autoClose(1000);
        return redirect()->route('buku.index');
    }

    
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        Alert::success('Success', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('buku.index');
    }
}
