<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Kasir\TransaksiController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index']);

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::resource('supplier', \App\Http\Controllers\Admin\SupplierController::class);

    Route::get('produk/kategori/{id}', [\App\Http\Controllers\Admin\ProdukController::class, 'kategori']);
    Route::resource('produk', \App\Http\Controllers\Admin\ProdukController::class);

    Route::get('transaksi/harga/{id}', [\App\Http\Controllers\Admin\TransaksiController::class, 'harga']);
    Route::resource('transaksi', \App\Http\Controllers\Admin\TransaksiController::class);

    Route::resource('jenis', \App\Http\Controllers\Admin\JenisController::class);

    Route::resource('kategori', \App\Http\Controllers\Admin\KategoriController::class);
});


Route::middleware('kasir')->prefix('kasir')->group(function () {
    Route::get('/', [\App\Http\Controllers\Kasir\DashboardController::class, 'index']);
    Route::resource('produk', \App\Http\Controllers\Kasir\ProdukController::class);

    Route::get('transaksi/harga/{id}', [\App\Http\Controllers\Kasir\TransaksiController::class, 'harga']);
    Route::resource('transaksi', \App\Http\Controllers\Kasir\TransaksiController::class);
});


Route::middleware('owner')->prefix('owner')->group(function () {
    Route::get('/', [\App\Http\Controllers\Kasir\DashboardController::class, 'index']);
    Route::resource('laporan-masuk', \App\Http\Controllers\Owner\LaporanmasukController::class);
    Route::resource('laporan-transaksi', \App\Http\Controllers\Owner\LaporantransaksiController::class);
    // Route::get('report/print', [\App\Http\Controllers\Owner\LaporanmasukController::class, 'print']);
});