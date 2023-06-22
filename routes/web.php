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

// Route::get('check-user', [HomeController::class, 'check_user']);

// Route::get('login', [UserController::class, 'index'])->middleware('isLogin');
// Route::post('login-new', [UserController::class, 'login_action'])->name('login.action')->middleware('isLogin');
// Route::get('logout', [UserController::class, 'logout'])->name('logout');


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

Route::middleware('owner')->prefix('owner')->group(function () {
    Route::get('/', [\App\Http\Controllers\Kasir\DashboardController::class, 'index']);
    Route::resource('laporan', \App\Http\Controllers\Owner\LaporanController::class);
});

Route::middleware('kasir')->prefix('kasir')->group(function () {
    Route::get('/', [\App\Http\Controllers\Kasir\DashboardController::class, 'index']);
    Route::resource('transaksi', \App\Http\Controllers\Kasir\TransaksiController::class);
    Route::resource('product', \App\Http\Controllers\Kasir\ProductController::class);
});
