<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

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
        $user = User::count();
        $kategori = Category::count();
        $barang = Barang::count();

        $date = date('Y-m-d');

        $barang_masuk_today = Barangmasuk::where('tgl_barang_masuk', '=', $date)->count();
        $barang_keluar_today = Barangkeluar::where('tgl_barang_keluar', '=', $date)->count();

        return view('home', compact('user','kategori','barang','barang_masuk_today','barang_keluar_today'));
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

        return view('gudang', compact('barang_masuk_today','barang_keluar_today'));
    }
}