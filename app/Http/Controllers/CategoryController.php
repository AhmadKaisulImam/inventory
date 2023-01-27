<?php

namespace App\Http\Controllers;

use App\Exports\CategoryExport;
use App\Models\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
            'nama_kategori' => 'required|unique:kategori|min:4',
            'seri'          => 'required|unique:kategori|min:2'
        ]);

        Category::create($validasi);

        alert()->success('Berhasil','Data Telah Ditambahkan');
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
            'nama_kategori' => 'required|min:4',
            'seri'          => 'required|min:2'
        ];

        $validasi = $request->validate($kategori);

        Category::where('id', $id)
                ->update($validasi);
                
        \alert()->info('Berhasil','Data Berhasil Diubah');
        return redirect('/kategori');
    }

    public function destroy($id)
    {
        $kategori = Category::find($id);
 
        // $kategori->barang()->delete();
        $kategori->delete();

        alert()->warning('Info','Data Telah Dibuang kesampah');
        return redirect('/kategori');
    }

    // eksport excel & csv
    public function export()
    {
        return Excel::download(new CategoryExport, 'kategori.xlsx');
    }
    public function exportcsv()
    {
        return Excel::download(new CategoryExport, 'kategori.csv');
    }
}
