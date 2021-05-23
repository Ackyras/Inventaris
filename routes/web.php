<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\BarangController;
use App\Http\Controllers\Dashboard\GedungController;
use App\Http\Controllers\Dashboard\RuanganController;
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

Auth::routes(['register' => false]);

Route::group(['middleware'  =>  ['auth']], function () {
    Route::get('/', function () {
        return view('master.dashboard');
    });
    Route::resource('barang', BarangController::class);
    Route::get('barang/search/', [BarangController::class, 'search'])->name('barang.search');
    Route::get('barang/delete/{id}', [BarangController::class, 'delete'])->name('barang.delete');

    Route::resource('ruangan', RuanganController::class);
    Route::name('ruangan.')->group(function () {
        Route::get('ruangan/search/', [RuanganController::class, 'search'])->name('search');
    });

    Route::resource('gedung', GedungController::class)->only(['index', 'create', 'store']);
});
