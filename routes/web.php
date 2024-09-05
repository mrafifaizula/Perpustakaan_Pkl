<?php


use App\Http\Controllers\KategoriController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// user
Route::get('/', [App\Http\Controllers\FrontController::class, 'perpustakaan']);
Route::resource('pinjaman', App\Http\Controllers\PinjamanController::class);
// show buku
Route::get('buku/{id}', [BukuController::class, 'show']);


// admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::resource('kategori', App\Http\Controllers\KategoriController::class);
    Route::resource('penulis', App\Http\Controllers\PenulisController::class);
    Route::resource('penerbit', App\Http\Controllers\PenerbitController::class);
    Route::resource('buku', App\Http\Controllers\BukuController::class);
    Route::resource('dashboard', App\Http\Controllers\FrontController::class);
    Route::resource('user', App\Http\Controllers\UsersController::class);
});
