<?php
namespace App\Http\Controllers;
use Alert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::all(); // Use plural 'user' for variable name
        confirmDelete('Delete', 'Apakah Kamu Yakin?');
        return view('admin.user.index', compact('user')); // Compact with plural 'user'
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
            'password' => 'required|min:8',
            'isAdmin' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->tlp = $request->tlp;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Correct case 'Hash'
        $user->isAdmin = $request->isAdmin;

        if ($request->hasFile('image_user')) {
            $img = $request->file('image_user');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/user/', $name);
            $user->image_user = $name;
        }

        $user->save();

        Alert::success('Success', 'Data Berhasil Disimpan')->autoClose(1000);
        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        
    }

    public function update(Request $request, User $user)
{
    // Validate the input fields (excluding password)
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            Rule::unique('users')->ignore($user->id)
        ],
    ]);

    // Update user details, excluding password
    $user->name = $request->name;
    $user->email = $request->email;
    $user->alamat = $request->alamat;
    $user->tlp = $request->tlp;

    // Only update password if a new one is provided
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password); // Hash the password before saving
    }

    // Handle image upload if provided
    if ($request->hasFile('image_user')) {
        $img = $request->file('image_user');
        $name = rand(1000, 9999) . $img->getClientOriginalName();
        $img->move('images/user', $name);
        $user->image_user = $name;
    }

    // Save the updated user details
    $user->save();
    Alert::success('Success', 'Profil Berhasil Diperbarui')->autoClose(1000);
    return redirect()->route('profil')->with('success', 'Profile updated successfully');
}

    
    

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Alert::success('Success', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
