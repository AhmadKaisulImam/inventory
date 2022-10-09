<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KategoriController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
  
// route admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Master Data User
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('/user/{id}/update', [UserController::class, 'update']);
    Route::get('/user/{id}/destroy', [UserController::class, 'destroy']);

    // Master Data Barang
    Route::get('/barang', [BarangController::class, 'index'])->name('barang');
    Route::post('/barang/store', [BarangController::class, 'store']);
    Route::post('/barang/{id}/update', [BarangController::class, 'update']);
    Route::get('/barang/{id}/destroy', [BarangController::class, 'destroy']);

    // Master Data Ketegori
    Route::get('/kategori', [CategoryController::class, 'index'])->name('kategori');
    Route::post('/kategori/store', [CategoryController::class, 'store']);
    Route::post('/kategori/{id}/update', [CategoryController::class, 'update']);
    Route::get('/kategori/{id}/destroy', [CategoryController::class, 'destroy']);
});
  
// route gudang
Route::middleware(['auth', 'user-access:gudang'])->group(function () {
  
    // Route::get('/super-admin/home', [HomeController::class, 'gudang'])->name('gudang');
    Route::get('/gudang', [HomeController::class, 'gudang'])->name('gudang');
});
  
