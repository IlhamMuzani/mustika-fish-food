<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IkanController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
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


Route::get('/', function () {
    return view('/welcome');
});
Route::get('checkuser', [HomeController::class, 'checkUser']);
Route::get('login', [UserController::class, 'index']);
Route::post('login-new', [UserController::class, 'login_action'])->name('login.action');



route::get('/admin', [DashboardController::class, 'admin'])->name('admin-view');
route::get('/owner', [DashboardController::class, 'owner'])->name('owner-view');
// Route::resource('ikan', IkanController::class);
Route::resource('pakan', PakanController::class);
Route::resource('transaksi', TransaksiController::class);

// Route::group(['middleware' => ['auth', 'level:admin']], function () {
//     Route::resource('dashboard', DashboardController::class);
// });

// Route::group(['middleware' => ['auth', 'level:owner']], function () {
//     Route::resource('dashboard', DashboardController::class);
// });

// Route::group(['middleware' => ['auth', 'level:pembeli']], function () {
// });

Route::middleware('admin')->prefix('admin')->group(function() {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::resource('ikan', IkanController::class);
});

Route::middleware('owner')->prefix('owner')->group(function () {
});