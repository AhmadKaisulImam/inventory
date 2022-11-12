<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangmasuk;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('Asia/Jakarta');

class BarangmasukController extends Controller
{
    public function index()
    {
        $barang_masuk   =   Barangmasuk::join('barang', 'barang.id', '=', 'brg_masuk.id_barang')
                        ->  join('kategori', 'kategori.id', '=', 'barang.id_kategori')
                        ->  select('brg_masuk.*', 'kategori.nama_kategori', 'barang.harga', 'barang.nama_barang')
                        ->  get();

        // $barang         = Barang::all();

        return view('gudang.transaksi.brg_masuk.brg_masuk', compact('barang_masuk'));
        
    }

    public function create()
    {
        $barang     = Barang::all();

        $q     = DB::table('brg_masuk')->select(DB::raw('MAX(RIGHT(no_barang_masuk,4)) as kode'));
        $kd       = "";
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp    = ((int)$k->kode)+1;
                $kd   = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd   = "0001";
        }

        return view('gudang.transaksi.brg_masuk.add', compact('barang','kd'));
    }

    public function ajax(Request $request)
    {
        $id_barang['id_barang'] = $request->id_barang;
        $ajax_barang            = Barang::where('id', $id_barang)->get();

        return view('gudang.transaksi.brg_masuk.ajax', compact('ajax_barang'));
    }

    public function store(Request $request)
    {
        Barangmasuk::create([
            'no_barang_masuk'   => $request->no_barang_masuk,
            'id_barang'         => $request->id_barang,
            'id_user'           => $request->id_user,
            'tgl_barang_masuk'  => $request->tgl_barang_masuk,
            'jml_barang_masuk'  => $request->jml_barang_masuk,
            'total'             => $request->total,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);

        $barang = Barang::find($request->id_barang);

        $barang->stok  += $request->jml_barang_masuk;
        $barang->save();

        // alert()->success('Berhasil','Data Berhasil Ditambahkan');
        toast('Data Berhasil Dimasukan', 'success');
        return redirect('/barang_masuk');
    }
}
