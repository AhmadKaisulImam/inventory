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
use App\Http\Controllers\BarangRusakController;
use App\Http\Controllers\CustomRegisterController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\SupplierController;
use App\Models\BarangRusak;

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

Route::get('/register', [CustomRegisterController::class, 'index']);
Route::post('/registrasi', [CustomRegisterController::class, 'store']);

Auth::routes();
Route::get('registration', [CustomRegisterController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomRegisterController::class, 'customRegistration'])->name('register.custom');
  
// route admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Master Data User
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('/user/{id}/update', [UserController::class, 'update']);
    Route::post('/user/{id}/updatepassword', [UserController::class, 'updatePassword']);
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

    // Master Data Barang Rusak
    Route::get('/barang_rusak', [BarangRusakController::class, 'index'])->name('barang_rusak');
    Route::get('/barang_rusak/ajax', [BarangRusakController::class, 'ajax']);
    Route::get('/barang_rusak/create', [BarangRusakController::class, 'create']);
    Route::post('/barang_rusak/store', [BarangRusakController::class, 'store']);
    Route::get('/barang_rusak/{barang_rusak}/edit', [BarangRusakController::class, 'edit']);
    Route::post('/barang_rusak/{id}/update', [BarangRusakController::class, 'update']);
    Route::get('/barang_rusak/{id}/destroy', [BarangRusakController::class, 'destroy']);

    
    // Laporan
    Route::get('/laporan_user', [LaporanController::class, 'laporan_user']);
    Route::get('/laporan_user/print_user', [LaporanController::class, 'print_user']);
    
    Route::get('/laporan_barang', [LaporanController::class, 'laporan_barang']);
    Route::get('/laporan_barang/print_barang', [LaporanController::class, 'print_barang']);
    
    Route::get('/laporan_kategori', [LaporanController::class, 'laporan_kategori']);
    Route::get('/laporan_kategori/print_kategori', [LaporanController::class, 'print_kategori']);

    Route::get('/laporan_supplier', [LaporanController::class, 'laporan_supplier']);
    Route::get('/laporan_supplier/print_supplier', [LaporanController::class, 'print_supplier']);
    
    Route::get('/laporan_masuk', [LaporanController::class, 'laporan_masuk']);
    Route::get('/laporan_masuk/print_masuk', [LaporanController::class, 'print_masuk']);
    
    Route::get('/laporan_keluar', [LaporanController::class, 'laporan_keluar']);
    Route::get('/laporan_keluar/print_keluar', [LaporanController::class, 'print_keluar']);

    Route::get('/laporan_rusak', [LaporanController::class, 'laporan_rusak']);
    Route::get('/laporan_rusak/print_rusak', [LaporanController::class, 'print_rusak']);
    

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
    Route::get('/barang_keluar/{id}/destroy', [BarangkeluarController::class, 'destroy']);

    // Sampah kategori
    Route::get('/sampah', [SampahController::class, 'trash_kategori']);
    Route::get('/sampah/{id}/restore', [SampahController::class, 'restore']);
    Route::get('/sampah/{id}/delete_kategori', [SampahController::class, 'delete_kategori']);

    // Sampah supplier
    Route::get('/sampah_supplier', [SampahController::class, 'trash_supplier']);
    Route::get('/sampahsupplier/{id}/restoresupplier', [SampahController::class, 'restoresupplier']);
    Route::get('/sampah/{id}/delete_supplier', [SampahController::class, 'delete_supplier']);
    
    // Sampah barang
    Route::get('/sampah_brg', [SampahController::class, 'trash_brg']);
    Route::get('/sampahbarang/{id}/restorebarang', [SampahController::class, 'restorebarang']);
    Route::get('/sampahbarang/{id}/delete_barang', [SampahController::class, 'delete_barang']);
    
    // Sampah barang rusak
    Route::get('/sampahbrgrusak', [SampahController::class, 'trash_brgrusak']);
    Route::get('/sampahbrgrusak/{id}/restorebrgrusak', [SampahController::class, 'restorebrgrusak']);
    Route::get('/sampahbrgrusak/{id}/delete_brgrusak', [SampahController::class, 'delete_brgrusak']);
    
    // Sampah barang masuk
    Route::get('/sampah_brgmasuk', [SampahController::class, 'trash_brgmasuk']);
    Route::get('/sampahbrgmasuk/{id}/restorebrgmasuk', [SampahController::class, 'restorebrgmasuk']);
    
    // Sampah barang keluar
    Route::get('/sampah_brgkeluar', [SampahController::class, 'trash_brgkeluar']);
    Route::get('/sampahbrgkeluar/{id}/restorebrgkeluar', [SampahController::class, 'restorebrgkeluar']);
    
    Route::get('/profile', [UserController::class, 'profile']);
    Route::patch('/profile/{id}', [UserController::class, 'update'])->name('profile.update');

    // export excel
    Route::get('/kategori/export', [CategoryController::class, 'export']);
    Route::get('/kategori/exportcsv', [CategoryController::class, 'exportcsv']);

    Route::get('/supplier/export', [SupplierController::class, 'export']);
    Route::get('/supplier/exportcsv', [SupplierController::class, 'exportcsv']);
    
    Route::get('/barang/export', [BarangController::class, 'export']);
    Route::get('/barang/exportcsv', [BarangController::class, 'exportcsv']);

    Route::get('/barangmasuk/export', [BarangmasukController::class, 'export']);
    Route::get('/barangmasuk/exportcsv', [BarangmasukController::class, 'exportcsv']);

    Route::get('/barangkeluar/export', [BarangkeluarController::class, 'export']);
    Route::get('/barangkeluar/exportcsv', [BarangkeluarController::class, 'exportcsv']);
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
  
