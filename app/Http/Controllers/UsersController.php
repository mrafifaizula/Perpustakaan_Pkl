<?php

namespace App\Http\Controllers;
use Alert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        $user = User::all();
        confirmDelete('Delete', 'Apakah Kamu Yakin?');
        return view('admin.user.index', compact('user'));

    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required',
            'tlp' => 'required',
            'email' => 'required|unique:user',
            'password' => 'required|min:8', // Add 'confirmed' if
            'isAdmin' => 'required',
            'image_user' => 'required|max:4000|mimes:jpeg,png,jpg,gif,svg',

        ]);
        $user = new User();
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->tlp = $request->tlp;
        $user->email = $request->email;
        $user->password = hash::make($request->password);
        $user->isAdmin = $request->isAdmin;

        if ($request->hasFile('image_user')) {
            $img = $request->file('image_user');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/user/', $name);
            $user->image_user = $name;
        }

        $user->save();

        Alert::success('Success', 'data Berhasil Disimpan')->autoClose(1000);
        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));

        $user->save();
        return redirect()->route('user.index');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required',
            'tlp' => 'required',
            'email' => 'required',
            'password' => 'required|min:8', // Add 'confirmed' if
            'isAdmin' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->tlp = $request->tlp;
        $user->email = $request->email;
        $user->password = hash::make($request->password);
        $user->isAdmin = $request->isAdmin;

        if ($request->hasFile('image_user')) {
            $user->deleteImage(); // untuk hapus gambar sebelum diganti gambar baru
            $img = $request->file('image_user');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/user/', $name);
            $user->image_user = $name;
        }

        $user->save();

        Alert::success('Success', 'Data Berhasil Di Edit')->autoClose(1000);
        return redirect()->route('user.index')->with('success', 'User update successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Alert::success('Success', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('user.index')->with('success', ' User deleted successfully');

    }
}
