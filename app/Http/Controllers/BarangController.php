<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
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

        $kategori   = Category::withTrashed()->get();

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
            'deskripsi'    => 'required',
            'image'        => 'image|file|max:2048',
        ]);

        if($request->file('image')) {
            $validasi['image'] = $request->file('image')->store('gambar-barang');
        }

        Barang::create($validasi);

        \alert()->success('Berhasil','Data Berhasil Ditambahkan');
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
            'image'        => 'image|file|max:2048',
            'deskripsi'    => 'required',
        ];

        $validasi = $request->validate($barang);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validasi['image'] = $request->file('image')->store('gambar-barang');
        }

        Barang::where('id', $id)
              ->update($validasi);

        \alert()->success('Berhasil','Data Berhasil Diubah');
        return redirect('/barang');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
 
        $barang->delete();

        \alert()->info('Info','Data Telah Dihapus');
        return redirect('/barang');
    }

    // export excel csv
    public function export()
    {
        return Excel::download(new BarangExport, 'barang.xlsx');
    }
    public function exportcsv()
    {
        return Excel::download(new BarangExport, 'barang.csv');
    }
}
