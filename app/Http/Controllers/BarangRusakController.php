<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangRusak;
use App\Models\Category;
use Illuminate\Http\Request;

class BarangRusakController extends Controller
{
    public function index()
    {
        $barang_rusak   = BarangRusak::all();
        $barang         = Barang::all();
        $kategori       = Category::all();

        return view('admin.master.barang_rusak.barang_rusak', compact('barang_rusak','barang'));
        
    }

    public function create()
    {
        $barang_rusak   = BarangRusak::all();
        $barang         = Barang::all();
        $kategori       = Category::all();

        return view('admin.master.barang_rusak.addbarang_rusak', compact('barang_rusak','barang'));
    }

    public function ajax(Request $request)
    {
        $id_barang['id_barang'] = $request->id_barang;
        $ajax_barang            = Barang::where('id', $id_barang)->get();

        return view('admin.master.barang_rusak.ajax', compact('ajax_barang'));
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'barang_id'         => 'required',
            'jumlah'            => 'required',
            'total'             => 'required',
            'deskripsi'         => 'required',
        ]);

        BarangRusak::create($validasi);

        $barang = Barang::find($request->barang_id);

        $barang->stok  -= $request->jumlah;
        $barang->save();

        toast()->success('Berhasil','Data Telah Ditambahkan');
        return redirect('/barang_rusak');
    }

    public function edit(BarangRusak $barang_rusak)
    {
        return \view('admin.master.barang_rusak.editbarang_rusak', [
            'barang_rusak' => $barang_rusak,
            'barang'       => Barang::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $barang_rusak = BarangRusak::find($id);

        $barang_rusak = [
            'barang_id'         => 'required',
            'jumlah'            => 'required',
            'total'             => 'required',
            'deskripsi'         => 'required',
        ];

        $validasi = $request->validate($barang_rusak);

        BarangRusak::where('id', $id)
              ->update($validasi);

        \toast()->success('Berhasil','Data Berhasil Diubah');
        return redirect('/barang_rusak');
    }

    public function destroy($id)
    {
        $barang_rusak = BarangRusak::find($id);
 
        $barang_rusak->delete();

        \toast()->info('Info','Data Telah Dihapus');
        return redirect('/barang_rusak');
    }
}
