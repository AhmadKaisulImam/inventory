<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

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
        $barang     = Barang::join('kategori', 'kategori.id', '=', 'barang.id_kategori')
                    -> select('barang.*', 'kategori.nama_kategori')
                    ->get();

        $kategori   = Category::all();

        return view('admin.master.barang', compact('barang', 'kategori'));
    }

    public function store(Request $request)
    {
        Barang::create([
            'id_kategori'  => $request->id_kategori,
            'nama_barang'  => $request->nama_barang,
            'harga'        => $request->harga,
            'stok'         => $request->stok,
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => date('Y-m-d H:i:s'),
        ]);

        // alert()->success('Berhasil','Data Berhasil Ditambahkan');
        toast('Data Berhasil Dimasukan', 'success');
        return redirect('/barang');
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        $barang->id_kategori  = $request->id_kategori;
        $barang->nama_barang    = $request->nama_barang;
        $barang->harga          = $request->harga;
        $barang->stok           = $request->stok;
        $barang->updated_at     = date('Y-m-d H:i:s');

        $barang->save();

        alert()->success('Berhasil','Data Berhasil Diubah');
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

        alert()->info('Info','Data Telah Dihapus');
        return redirect('/barang');
    }
}
