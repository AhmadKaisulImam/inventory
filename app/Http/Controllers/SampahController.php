<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash_kategori()
    {
        $kategori = Category::onlyTrashed()->get();

        return \view('admin.master.sampah.sampah_kategori', \compact('kategori'));
    }

    public function trash_brg()
    {
        $kategori = Category::onlyTrashed()->get();
        $barang = Barang::onlyTrashed()->get();

        return \view('admin.master.sampah.sampah_brg', \compact('kategori', 'barang'));
    }

    public function trash_supplier()
    {
        $supplier = Supplier::onlyTrashed()->get();

        return \view('admin.master.sampah.sampah_supplier', \compact('supplier'));
    }

    public function trash_brgmasuk()
    {
        $barang_masuk = Barangmasuk::onlyTrashed()->get();

        return \view('admin.master.sampah.sampah_brgmasuk', \compact('barang_masuk'));
    }

    public function trash_brgkeluar()
    {
        $barang_keluar = Barangkeluar::onlyTrashed()->get();

        return \view('admin.master.sampah.sampah_brgkeluar', \compact('barang_keluar'));
    }

    public function restore($id)
    {
        $kategori = Category::withTrashed()->where('id', $id)->restore();

        \toast()->success('Berhasil', 'Data berhasil Di Restore');
        return \redirect('/sampah');
    }

    public function restorebarang($id)
    {
        $barang = Barang::withTrashed()->where('id', $id)->restore();

        \toast()->success('Berhasil', 'Data berhasil Di Restore');
        return \redirect('/sampah_brg');
    }

    public function restoresupplier($id)
    {
        $supplier = Supplier::withTrashed()->where('id', $id)->restore();

        \toast()->success('Berhasil', 'Data berhasil Di Restore');
        return \redirect('/sampah_supplier');
    }

    public function restorebrgmasuk($id)
    {
        $brg_masuk = Barangmasuk::onlyTrashed()->find($id);
        
        $barang = Barang::where('id', $brg_masuk->barang_id)
                ->first();

        $barang_masuk = Barangmasuk::withTrashed()->where('id', $id)->restore();
        if($barang_masuk)
        {
            $barang->stok += $brg_masuk->jml_barang_masuk;
            $barang->save();
        }

        \toast()->success('Berhasil', 'Data berhasil Di Restore');
        return \redirect('/sampah_brgmasuk');
    }

    public function restorebrgkeluar($id)
    {
        $brg_keluar = Barangkeluar::onlyTrashed()->find($id);

        $barang = Barang::where('id', $brg_keluar->barang_id)
                ->first();

        $barang_keluar = Barangkeluar::withTrashed()->where('id', $id)->restore();

        if($barang_keluar)
        {
            $barang->stok -= $brg_keluar->jml_barang_keluar;
            $barang->save();
        }

        \toast()->success('Berhasil', 'Data berhasil Di Restore');
        return \redirect('/sampah_brgkeluar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
