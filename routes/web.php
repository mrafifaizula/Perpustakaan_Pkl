<?php


use App\Http\Controllers\FrontController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjambukuController;
use App\Http\Controllers\KontakController;
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

Route::get('/gg', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FrontController::class, 'index'])->name('frontend.index');

// user
Route::group(['prefix' => '/'], function () {
    Route::resource('kontak', KontakController::class);
    Route::get('buku/{id}', [BukuController::class, 'show']);

    Route::group(['middleware' => ['auth']], function () {
        // Route::resource('pinjambuku', PinjambukuController::class);
        Route::get('pinjam/buku/{id}', [FrontController::class, 'ShowPinjambuku']);

    });


});

// profil
Route::group(['prefix' => 'profil', 'middleware' => ['auth']], function () {
    Route::get('dashboard', [FrontController::class, 'perpustakaan']);
    Route::get('daftarbuku', [FrontController::class, 'daftarbuku']);
    Route::get('buku/{id}', [FrontController::class, 'showbukuprofil']);
    Route::get('pinjam/buku/{id}', [FrontController::class, 'pinjambukuprofil']);
    Route::get('anda', [FrontController::class, 'profil'])->name('profil');
    // Route::patch('anda', [UsersController::class, 'update'])->name('profil.update'); // To handle the PATCH request

    Route::get('pinjambuku', [PinjambukuController::class, 'index'])->name('profil.datapinjambuku.index');

    Route::post('pinjambuku', [PinjambukuController::class, 'store'])->name('pinjambuku.store');

    // Route untuk pengguna mengajukan pengembalian
    Route::put('pinjambuku/{id}/ajukan-pengembalian', [PinjamBukuController::class, 'ajukanPengembalian'])->name('pinjambuku.ajukanPengembalian');

    Route::post('batalkan-pengajuan-pengembalian/{id}', [PinjamBukuController::class, 'batalkanPengajuanPengembalian'])->name('batalkan.pengajuan.pengembalian');

    // web.php
    Route::post('/batalkan-pengajuan/{id}', [PinjamBukuController::class, 'batalkanPengajuan'])->name('batalkan.pengajuan');





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

    Route::get('dipinjam', [App\Http\Controllers\BackController::class, 'dipinjam']);

    Route::get('pengembalian', [App\Http\Controllers\BackController::class, 'dikembalikan']);

    Route::get('pengajuankembali', [App\Http\Controllers\BackController::class, 'pengajuankembali']);

    Route::get('pinjambuku', [App\Http\Controllers\BackController::class, 'pinjambuku'])->name('admin.pinjambuku.index');

    Route::put('pinjambuku/menyetujui/{id}', [PinjambukuController::class, 'menyetujui'])->name('pinjambuku.menyetujui');

    Route::put('pinjambuku/tolak/{id}', [PinjambukuController::class, 'tolak'])->name('pinjambuku.tolak');

    // Route untuk admin menyetujui pengembalian
    Route::put('pinjambuku/{id}/acc-pengembalian', [PinjambukuController::class, 'accPengembalian'])->name('admin.pinjambuku.accPengembalian');



});
