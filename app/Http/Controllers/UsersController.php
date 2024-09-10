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
        $users = User::all(); // Use plural 'users' for variable name
        confirmDelete('Delete', 'Apakah Kamu Yakin?');
        return view('admin.user.index', compact('users')); // Compact with plural 'users'
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users', // Correct table name
            'password' => 'required|min:8',
            'isAdmin' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Correct case 'Hash'
        $user->isAdmin = $request->isAdmin;
        $user->save();

        Alert::success('Success', 'Data Berhasil Disimpan')->autoClose(1000);
        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required|min:8',
            'isAdmin' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Correct case 'Hash'
        $user->isAdmin = $request->isAdmin;
        $user->save();

        Alert::success('Success', 'Data Berhasil Di Edit')->autoClose(1000);
        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Alert::success('Success', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
