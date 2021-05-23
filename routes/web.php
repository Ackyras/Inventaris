<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\BarangController;
use App\Http\Controllers\Dashboard\GedungController;
use App\Http\Controllers\Dashboard\PeminjamanController;
use App\Http\Controllers\Dashboard\RuanganController;
use App\Http\Controllers\PinjamanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::name('client.')->group(function () {
    Route::get('form', [PinjamanController::class, 'form'])->name('form');
    Route::post('store', [PinjamanController::class, 'store'])->name('store');
    Route::get('list', [PinjamanController::class, 'index'])->name('index');
});

Auth::routes(['register' => false]);

Route::group(['middleware'  =>  ['auth']], function () {
    Route::get('/', function () {
        return view('master.dashboard');
    });

    Route::get('peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');

    Route::resource('barang', BarangController::class);
    Route::get('barang/search/', [BarangController::class, 'search'])->name('barang.search');
    Route::get('barang/delete/{id}', [BarangController::class, 'delete'])->name('barang.delete');

    Route::resource('ruangan', RuanganController::class)->except(['update']);
    Route::name('ruangan.')->group(function () {
        Route::post('ruangan/{id}', [RuanganController::class, 'update'])->name('update');
        Route::get('ruangan/search/', [RuanganController::class, 'search'])->name('search');
    });

    Route::resource('gedung', GedungController::class)->except(['update']);
    Route::name('gedung.')->group(function () {
        Route::post('gedung/{id}', [GedungController::class, 'update'])->name('update');
        Route::get('gedung/search/', [GedungController::class, 'search'])->name('search');
    });
});
