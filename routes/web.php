<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BarangmasukController;
use App\Http\Controllers\BarangkeluarController;
use App\Http\Controllers\SupplierController;

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
    Route::get('/barang/create', [BarangController::class, 'create']);
    Route::get('/barang/{barang}/edit', [BarangController::class, 'edit']);
    Route::post('/barang/store', [BarangController::class, 'store']);
    Route::post('/barang/{id}/update', [BarangController::class, 'update']);
    Route::get('/barang/{id}/destroy', [BarangController::class, 'destroy']);

    // Master Data Supplier
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
    Route::get('/supplier/create', [SupplierController::class, 'create']);
    Route::get('/supplier/{supplier}/edit', [SupplierController::class, 'edit']);
    Route::post('/supplier/store', [SupplierController::class, 'store']);
    Route::post('/supplier/{id}/update', [SupplierController::class, 'update']);
    Route::get('/supplier/{id}/destroy', [SupplierController::class, 'destroy']);

    // Master Data Ketegori
    Route::get('/kategori', [CategoryController::class, 'index'])->name('kategori');
    Route::get('/kategori/create', [CategoryController::class, 'create']);
    Route::get('/kategori/{category}/edit', [CategoryController::class, 'edit']);
    Route::post('/kategori/store', [CategoryController::class, 'store']);
    Route::post('/kategori/{id}/update', [CategoryController::class, 'update']);
    Route::get('/kategori/{id}/destroy', [CategoryController::class, 'destroy']);
    
    // Laporan
    Route::get('/laporan_user', [LaporanController::class, 'laporan_user']);
    Route::get('/laporan_user/print_user', [LaporanController::class, 'print_user']);
    
    Route::get('/laporan_barang', [LaporanController::class, 'laporan_barang']);
    Route::get('/laporan_barang/print_barang', [LaporanController::class, 'print_barang']);
    
    Route::get('/laporan_kategori', [LaporanController::class, 'laporan_kategori']);
    Route::get('/laporan_kategori/print_kategori', [LaporanController::class, 'print_kategori']);
    
    Route::get('/laporan_masuk', [LaporanController::class, 'laporan_masuk']);
    Route::get('/laporan_masuk/print_masuk', [LaporanController::class, 'print_masuk']);
    
    Route::get('/laporan_keluar', [LaporanController::class, 'laporan_keluar']);
    Route::get('/laporan_keluar/print_keluar', [LaporanController::class, 'print_keluar']);
    

    // Transaki Data Barang Masuk
    Route::get('/barang_masuk', [BarangmasukController::class, 'index']);
    Route::get('/barang_masuk/ajax', [BarangmasukController::class, 'ajax']);
    Route::get('/barang_masuk/create', [BarangmasukController::class, 'create']);
    Route::post('/barang_masuk/store', [BarangmasukController::class, 'store']);
    Route::get('/barang_masuk/{id}/destroy', [BarangmasukController::class, 'destroy']);
    
    // Transaki Data Barang Keluar
    Route::get('/barang_keluar', [BarangkeluarController::class, 'index']);
    Route::get('/barang_keluar/ajax', [BarangkeluarController::class, 'ajax']);
    Route::get('/barang_keluar/create', [BarangkeluarController::class, 'create']);
    Route::post('/barang_keluar/store', [BarangkeluarController::class, 'store']);

});
  
// route gudang
// Route::middleware(['auth', 'user-access:gudang'])->group(function () {
  
//     // Route::get('/super-admin/home', [HomeController::class, 'gudang'])->name('gudang');
//     Route::get('/gudang', [HomeController::class, 'gudang'])->name('gudang');

//     // Transaki Data Barang Masuk
//     Route::get('/barang_masuk', [BarangmasukController::class, 'index']);
//     Route::get('/barang_masuk/ajax', [BarangmasukController::class, 'ajax']);
//     Route::get('/barang_masuk/create', [BarangmasukController::class, 'create']);
//     Route::post('/barang_masuk/store', [BarangmasukController::class, 'store']);
//     Route::get('/barang_masuk/{id}/destroy', [BarangController::class, 'destroy']);
    
//     // Transaki Data Barang Keluar
//     Route::get('/barang_keluar', [BarangkeluarController::class, 'index']);
//     Route::get('/barang_keluar/ajax', [BarangkeluarController::class, 'ajax']);
//     Route::get('/barang_keluar/create', [BarangkeluarController::class, 'create']);
//     Route::post('/barang_keluar/store', [BarangkeluarController::class, 'store']);
// });
  
