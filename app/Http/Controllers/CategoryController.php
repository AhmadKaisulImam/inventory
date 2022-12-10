<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

date_default_timezone_set('Asia/Jakarta');

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Category::get();

        return view('admin.master.kategori.kategori', compact('kategori'));
    }

    public function create()
    {
        $kategori = Category::all();

        return view('admin.master.kategori.addkategori', compact('kategori'));
    }

    public function store(Request $request)
    {

        $validasi =  $request->validate([
            'nama_kategori' => 'required|unique:kategori|min:4'
        ]);

        Category::create($validasi);

        toast()->success('Berhasil','Data Telah Ditambahkan');
        return redirect('/kategori');

    }

    public function edit(Category $category)
    {
        return \view('admin.master.kategori.editkategori', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {

        $kategori = Category::find($id);
 
        $kategori = [
            'nama_kategori' => 'required|unique:kategori|min:4'
        ];

        $validasi = $request->validate($kategori);

        Category::where('id', $id)
                ->update($validasi);
                
        \toast()->success('Berhasil','Data Berhasil Diubah');
        return redirect('/kategori');
    }

    public function destroy($id)
    {
        $kategori = Category::find($id);
 
        // $kategori->barang()->delete();
        $kategori->delete();

        \toast()->info('Info','Data Telah Dihapus');
        return redirect('/kategori');
    }
}
