<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('Asia/Jakarta');

class BarangmasukController extends Controller
{
    public function index()
    {
        $barang_masuk   = Barangmasuk::all();
        $kategori       = Category::all();
        $barang         = Barang::all();
        $supplier       = Supplier::all();

        return view('gudang.transaksi.brg_masuk.brg_masuk', compact('barang_masuk','kategori','barang','supplier'));
        
    }

    public function create()
    {
        $barang    = Barang::all();
        $supplier  = Supplier::all();

        $q        = DB::table('barang_masuk')->select(DB::raw('MAX(RIGHT(no_barang_masuk,4)) as kode'));
        $kd       = "";
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp  = ((int)$k->kode)+1;
                $kd   = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd   = "0001";
        }

        return view('gudang.transaksi.brg_masuk.add', compact('barang','kd','supplier'));
    }

    public function edit($id)
    {
        $barang_masuk = Barangmasuk::findOrFail($id);
        $barang       = Barang::all();
        $supplier     = Supplier::all();

        $q        = DB::table('barang_masuk')->select(DB::raw('MAX(RIGHT(no_barang_masuk,4)) as kode'));
        $kd       = "";
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp  = ((int)$k->kode)+1;
                $kd   = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd   = "0001";
        }

        return view('gudang.transaksi.brg_masuk.edit', \compact('barang_masuk','barang', 'kd', 'supplier'));
    }

    public function ajax(Request $request)
    {
        $id_barang['id_barang'] = $request->id_barang;
        $ajax_barang            = Barang::where('id', $id_barang)->get();

        return view('gudang.transaksi.brg_masuk.ajax', compact('ajax_barang'));
    }

    public function store(Request $request)
    {
        // Barangmasuk::create([
        //     'no_barang_masuk'   => $request->no_barang_masuk,
        //     'supplier_id'       => $request->supplier_id,
        //     'barang_id'         => $request->barang_id,
        //     'tgl_barang_masuk'  => $request->tgl_barang_masuk,
        //     'jml_barang_masuk'  => $request->jml_barang_masuk,
        //     'total'             => $request->total,
        // ]);

        $validasi = $request->validate([
            'no_barang_masuk'   => 'required',
            'supplier_id'       => 'required',
            'barang_id'         => 'required',
            'tgl_barang_masuk'  => 'required',
            'jml_barang_masuk'  => 'required|min:1',
            'total'             => 'required',
        ]);

        Barangmasuk::create($validasi);

        $barang = Barang::find($request->barang_id);

        $barang->stok  += $request->jml_barang_masuk;
        $barang->save();

        toast()->success('Berhasil','Data Telah Ditambahkan');
        return redirect('/barang_masuk');
    }

    public function destroy($id)
    {
        $barang_masuk = Barangmasuk::find($id);
        $barang = Barang::where('id', $barang_masuk->barang_id)
                ->first();

        $barang_masuk->delete();
        if($barang_masuk)
        {
            $barang->stok -= $barang_masuk->jml_barang_masuk;
            $barang->save();
        }

        toast()->warning('Berhasil','Data Telah Dihapus');
        return redirect('/barang_masuk');
    }
}
