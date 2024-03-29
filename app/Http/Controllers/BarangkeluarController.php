<?php

namespace App\Http\Controllers;

use App\Exports\BarangkeluarExport;
use App\Models\Barang;
use App\Models\Category;
use App\Models\Barangkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


date_default_timezone_set('Asia/Jakarta');

class BarangkeluarController extends Controller
{
    public function index()
    {
        $barang_keluar  = Barangkeluar::all();
        $barang         = Barang::all();

        return view('gudang.transaksi.brg_keluar.brg_keluar', compact('barang_keluar'));
        
    }

    public function create()
    {
        $barang     = Barang::all();

        $q     = DB::table('barang_keluar')->select(DB::raw('MAX(RIGHT(no_barang_keluar,4)) as kode'));
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

        return view('gudang.transaksi.brg_keluar.add', compact('barang','kd'));
    }

    public function ajax(Request $request)
    {
        $id_barang['barang_id'] = $request->id_barang;
        $ajax_barang            = Barang::where('id', $id_barang)->get();

        return view('gudang.transaksi.brg_keluar.ajax', compact('ajax_barang'));
    }

    public function store(Request $request)
    {
        
        $barang = Barang::find($request->id_barang);

        if($barang->stok < $request->jml_barang_keluar)
        {
            alert()->error('Gagal','Stok Barang Kurang');
            return redirect('/barang_keluar/create');
        }
        else
        {
            Barangkeluar::create([
                'no_barang_keluar'   => $request->no_barang_keluar,
                'barang_id'          => $request->id_barang,
                'tgl_barang_keluar'  => $request->tgl_barang_keluar,
                'jml_barang_keluar'  => $request->jml_barang_keluar,
                'harga'              => $request->harga,
                'total'              => $request->total,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ]);

            $barang->stok  -= $request->jml_barang_keluar;
            $barang->save();
            toast('Data Berhasil Disimpan', 'success');
            return redirect('/barang_keluar');
        }
    }

    public function destroy($id)
    {
        $barang_keluar = Barangkeluar::find($id);
        $barang = Barang::where('id', $barang_keluar->barang_id)
                ->first();

        $barang_keluar->delete();
        if($barang_keluar)
        {
            $barang->stok += $barang_keluar->jml_barang_keluar;
            $barang->save();
        }

        toast()->warning('Berhasil','Data Telah Dihapus');
        return redirect('/barang_keluar');
    }

    public function export(Request $request)
    {
        return (new BarangkeluarExport($request->tgl_mulai, $request->tgl_selesai))->download('laporankeluar.xlsx');
    }

    public function exportcsv(Request $request)
    {
        return (new BarangkeluarExport($request->tgl_mulai, $request->tgl_selesai))->download('laporankeluar.csv');
    }
}
