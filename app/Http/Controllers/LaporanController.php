<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Barang;
use App\Models\Category;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use App\Models\BarangRusak;
use App\Models\Supplier;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan_user()
    {
        $user = User::all();

        return view('admin.laporan.user.laporan_user', compact('user'));
    }

    public function print_user()
    {
        $user = User::all();

        return view('admin.laporan.user.print_user', compact('user'));
    }

    // laporan kategori
    public function laporan_kategori()
    {
        $kategori = Category::all();

        return view('admin.laporan.kategori.laporan_kategori', compact('kategori'));
    }

    public function print_kategori()
    {
        $kategori = Category::all();

        return view('admin.laporan.kategori.print_kategori', compact('kategori'));
    }
    
    // laporan supplier
    public function laporan_supplier()
    {
        $supplier = Supplier::all();

        return view('admin.laporan.supplier.laporan_supplier', compact('supplier'));
    }

    public function print_supplier()
    {
        $supplier = Supplier::all();

        return view('admin.laporan.supplier.print_supplier', compact('supplier'));
    }

    // laporan barang
    public function laporan_barang()
    {
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        
        $barang     = Barang::all();

        $kategori   = Category::all();

        return view('admin.laporan.barang.laporan_barang', compact('barang','kategori'));
    }

    public function print_barang()
    {
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');

        $barang     = Barang::all();

        $kategori   = Category::all();

        return view('admin.laporan.barang.print_barang', compact('barang', 'kategori', 'today'));
    }

    // laporan barang masuk
    public function laporan_masuk()
    {
        // $barang_masuk   =   Barangmasuk::join('barang', 'barang.id', '=', 'brg_masuk.id_barang')
        //                 ->  join('kategori', 'kategori.id', '=', 'barang.id_kategori')
        //                 ->  select('brg_masuk.*', 'kategori.nama_kategori', 'barang.harga', 'barang.nama_barang')
        //                 ->  get();

        $barang_masuk = Barangmasuk::all();
        $barang = Barang::all();
        $supplier = Supplier::all();
        $kategori = Category::all();

        return view('admin.laporan.barang_masuk.laporan_masuk', compact('barang_masuk','barang','kategori'));
    }

    public function print_masuk(Request $request)
    {
        $tgl_mulai      = $request->tgl_mulai;
        $tgl_selesai    = $request->tgl_selesai;

        if($tgl_mulai AND $tgl_selesai){
            $barang_masuk   =   Barangmasuk::join('barang', 'barang.id', '=', 'barang_masuk.barang_id')
                            ->  join('supplier', 'supplier.id', '=', 'barang_masuk.supplier_id')
                            ->  select('barang_masuk.*', 'supplier.nama_supplier', 'barang.harga_beli', 'barang.nama_barang')
                            ->  whereBetween('barang_masuk.tgl_barang_masuk', [$tgl_mulai,$tgl_selesai])
                            ->  get();

            $sum_total      = Barangmasuk::whereBetween('tgl_barang_masuk', [$tgl_mulai,$tgl_selesai])
                            ->  sum('total');
        }else{
            $barang_masuk   =   Barangmasuk::join('barang', 'barang.id', '=', 'barang_masuk.barang_id')
                            ->  join('supplier', 'supplier.id', '=', 'barang.supplier_id')
                            ->  select('barang_masuk.*', 'supplier.nama_supplier', 'barang.harga_beli', 'barang.nama_barang')
                            ->  get();
        }


        return view('admin.laporan.barang_masuk.print_masuk', compact('barang_masuk','sum_total','tgl_mulai','tgl_selesai'));
    }

    // laporan barang keluar
    public function laporan_keluar()
    {
        $barang_keluar   =   Barangkeluar::join('barang', 'barang.id', '=', 'barang_keluar.barang_id')
                        ->  join('kategori', 'kategori.id', '=', 'barang.category_id')
                        ->  select('barang_keluar.*', 'kategori.nama_kategori', 'barang.harga_jual', 'barang.nama_barang')
                        ->  get();

        return view('admin.laporan.barang_keluar.laporan_keluar', compact('barang_keluar'));
    }

    public function print_keluar(Request $request)
    {
        $tgl_mulai      = $request->tgl_mulai;
        $tgl_selesai    = $request->tgl_selesai;

        if($tgl_mulai AND $tgl_selesai){
            $barang_keluar   =   Barangkeluar::join('barang', 'barang.id', '=', 'barang_keluar.barang_id')
                            ->  join('kategori', 'kategori.id', '=', 'barang.category_id')
                            ->  select('barang_keluar.*', 'kategori.nama_kategori', 'barang.harga_jual', 'barang.nama_barang')
                            ->  whereBetween('barang_keluar.tgl_barang_keluar', [$tgl_mulai,$tgl_selesai])
                            ->  get();

            $sum_total      = Barangkeluar::whereBetween('tgl_barang_keluar', [$tgl_mulai,$tgl_selesai])
                            ->  sum('total');
        }else{
            $barang_keluar   =   Barangkeluar::join('barang', 'barang.id', '=', 'barang_keluar.barang_id')
                        ->  join('kategori', 'kategori.id', '=', 'barang.category_id')
                        ->  select('barang_keluar.*', 'kategori.nama_kategori', 'barang.harga_jual', 'barang.nama_barang')
                        ->  get();
        }


        return view('admin.laporan.barang_keluar.print_keluar', compact('barang_keluar','sum_total','tgl_mulai','tgl_selesai'));
    }

    // laporan rusak
    public function laporan_rusak()
    {
        $rusak = BarangRusak::all();

        return view('admin.laporan.barang_rusak.laporan_rusak', compact('rusak'));
    }

    public function print_rusak()
    {
        $rusak  = BarangRusak::all();
        $barang = Barang::all();

        return view('admin.laporan.barang_rusak.print_rusak', compact('rusak','barang'));
    }
}
