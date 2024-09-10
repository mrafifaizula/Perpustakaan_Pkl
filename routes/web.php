<?php


use App\Http\Controllers\KategoriController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjambukuController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KontakController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsStap;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/gg', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// user
Route::group(['prefix' => '/'], function () {
    Route::get('/', [FrontController::class, 'index'])->name('frontend.index');
    Route::get('profil/dashboard', [App\Http\Controllers\FrontController::class, 'perpustakaan']);
    Route::get('profil/daftarbuku', [App\Http\Controllers\FrontController::class, 'daftarbuku']);
    Route::get('buku/{id}', [BukuController::class, 'show']);
    Route::get('pinjam/buku/{id}', [FrontController::class, 'ShowPinjambuku']);
    Route::get('/profil/pinjambuku', [PinjamBukuController::class, 'index'])->name('profil.pinjambuku.index');

    Route::resource('pinjambuku', PinjamBukuController::class);
    Route::resource('profil/profil', ProfilController::class);
    Route::resource('/kontak', KontakController::class);

});

// admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::resource('kategori', App\Http\Controllers\KategoriController::class);
    Route::resource('penulis', App\Http\Controllers\PenulisController::class);
    Route::resource('penerbit', App\Http\Controllers\PenerbitController::class);
    Route::resource('buku', App\Http\Controllers\BukuController::class);
    Route::resource('dashboard', App\Http\Controllers\BackController::class);
    Route::resource('user', App\Http\Controllers\UsersController::class);
    // Route::resource('pinjambuku', App\Http\Controllers\PinjambukuController::class);
    Route::get('pinjambuku', [App\Http\Controllers\BackController::class, 'pinjambuku']);
});
