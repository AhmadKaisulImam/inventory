<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $supplier = Supplier::count();
        $kategori = Category::count();
        $barang = Barang::count();

        $date = date('Y-m-d');
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');

        $total_keluar           = Barangkeluar::where('tgl_barang_keluar', '=', $date)->sum('total');
        $total_masuk            = Barangmasuk::where('tgl_barang_masuk', '=', $date)->sum('total');
        $barang_masuk_today     = Barangmasuk::where('tgl_barang_masuk', '=', $date)->sum('jml_barang_masuk');
        $barang_keluar_today    = Barangkeluar::where('tgl_barang_keluar', '=', $date)->sum('jml_barang_keluar');

        $barang_masuk = Barangmasuk::count();
        $barang_keluar = Barangkeluar::count();

        $masuk1 = Barangmasuk::whereMonth('tgl_barang_masuk', '01')->sum('jml_barang_masuk');
        $masuk2 = Barangmasuk::whereMonth('tgl_barang_masuk', '02')->sum('jml_barang_masuk');
        $masuk3 = Barangmasuk::whereMonth('tgl_barang_masuk', '03')->sum('jml_barang_masuk');
        $masuk4 = Barangmasuk::whereMonth('tgl_barang_masuk', '04')->sum('jml_barang_masuk');
        $masuk5 = Barangmasuk::whereMonth('tgl_barang_masuk', '05')->sum('jml_barang_masuk');
        $masuk6 = Barangmasuk::whereMonth('tgl_barang_masuk', '06')->sum('jml_barang_masuk');
        $masuk7 = Barangmasuk::whereMonth('tgl_barang_masuk', '07')->sum('jml_barang_masuk');
        $masuk8 = Barangmasuk::whereMonth('tgl_barang_masuk', '08')->sum('jml_barang_masuk');
        $masuk9 = Barangmasuk::whereMonth('tgl_barang_masuk', '09')->sum('jml_barang_masuk');
        $masuk10 = Barangmasuk::whereMonth('tgl_barang_masuk', '10')->sum('jml_barang_masuk');
        $masuk11 = Barangmasuk::whereMonth('tgl_barang_masuk', '11')->sum('jml_barang_masuk');
        $masuk12 = Barangmasuk::whereMonth('tgl_barang_masuk', '12')->sum('jml_barang_masuk');

        $keluar1 = Barangkeluar::whereMonth('tgl_barang_keluar', '01')->sum('jml_barang_keluar');
        $keluar2 = Barangkeluar::whereMonth('tgl_barang_keluar', '02')->sum('jml_barang_keluar');
        $keluar3 = Barangkeluar::whereMonth('tgl_barang_keluar', '03')->sum('jml_barang_keluar');
        $keluar4 = Barangkeluar::whereMonth('tgl_barang_keluar', '04')->sum('jml_barang_keluar');
        $keluar5 = Barangkeluar::whereMonth('tgl_barang_keluar', '05')->sum('jml_barang_keluar');
        $keluar6 = Barangkeluar::whereMonth('tgl_barang_keluar', '06')->sum('jml_barang_keluar');
        $keluar7 = Barangkeluar::whereMonth('tgl_barang_keluar', '07')->sum('jml_barang_keluar');
        $keluar8 = Barangkeluar::whereMonth('tgl_barang_keluar', '08')->sum('jml_barang_keluar');
        $keluar9 = Barangkeluar::whereMonth('tgl_barang_keluar', '09')->sum('jml_barang_keluar');
        $keluar10 = Barangkeluar::whereMonth('tgl_barang_keluar', '10')->sum('jml_barang_keluar');
        $keluar11 = Barangkeluar::whereMonth('tgl_barang_keluar', '11')->sum('jml_barang_keluar');
        $keluar12 = Barangkeluar::whereMonth('tgl_barang_keluar', '12')->sum('jml_barang_keluar');

        return view('home', compact('supplier','total_masuk','total_keluar','kategori','barang','barang_masuk_today','barang_keluar_today',
                                    'barang_masuk', 'barang_keluar','today',
                                    'masuk1', 'masuk2', 'masuk3', 'masuk4', 'masuk5', 'masuk6', 
                                    'masuk7', 'masuk8', 'masuk9', 'masuk10', 'masuk11', 'masuk12',
                                    'keluar1', 'keluar2', 'keluar3', 'keluar4', 'keluar5', 'keluar6', 
                                    'keluar7', 'keluar8', 'keluar9', 'keluar10', 'keluar11', 'keluar12'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function gudang()
    {
        $date = date('Y-m-d');

        $barang_masuk_today = Barangmasuk::where('tgl_barang_masuk', '=', $date)->count();
        $barang_keluar_today = Barangkeluar::where('tgl_barang_keluar', '=', $date)->count();

        return view('gudang', \compact('barang_masuk_today','barang_keluar_today'));
    }
}