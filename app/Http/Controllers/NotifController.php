<?php
namespace App\Http\Controllers;

use App\Models\Pinjambuku;
use Illuminate\Http\Request;
use Auth;

class NotifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();
    
        if (!$user) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }
    
        // Fetch notifications for the authenticated user
        $notifications = Pinjambuku::where('id_user', $user->id)
            ->whereIn('status', [
                'menunggu pengembalian', 
                'diterima', 
                'ditolak', 
                'pengembalian ditolak', 
                'dikembalikan'
            ])
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();
    
        return view('layouts.profil.nav', ['notifications' => $notifications]);
    }
    
}
