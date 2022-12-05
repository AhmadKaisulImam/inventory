<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangmasuk;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

date_default_timezone_set('Asia/Jakarta');

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang     = Barang::all();

        $kategori   = Category::all();

        return view('admin.master.barang.barang', compact('barang', 'kategori'));
    }

    public function create()
    {
        $barang     = Barang::all();

        $kategori   = Category::all();

        return \view('admin.master.barang.addbarang', \compact('barang', 'kategori'));
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'category_id'  => 'required',
            'nama_barang'  => 'required|unique:barang|min:4|max:256',
            'harga_beli'   => 'required',
            'harga_jual'   => 'required',
            'stok'         => 'required',
        ]);

        Barang::create($validasi);

        \toast()->success('Berhasil','Data Berhasil Ditambahkan');
        return redirect('/barang');
    }

    public function edit(Barang $barang)
    {
        return \view('admin.master.barang.editbarang', [
            'barang' => $barang,
            'kategori' => Category::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        $barang = [
            'category_id'  => 'required',
            'nama_barang'  => 'required|min:4|max:256',
            'harga_beli'   => 'required',
            'harga_jual'   => 'required',
            'stok'         => 'required',
        ];

        $validasi = $request->validate($barang);

        Barang::where('id', $id)
              ->update($validasi);

        \toast()->success('Berhasil','Data Berhasil Diubah');
        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
 
        $barang->delete();

        \toast()->info('Info','Data Telah Dihapus');
        return redirect('/barang');
    }
}
