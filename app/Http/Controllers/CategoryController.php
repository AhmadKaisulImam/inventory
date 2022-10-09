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
        $kategori = Category::all();

        return view('admin.master.kategori', compact('kategori'));
    }

    public function store(Request $request)
    {
        $isi = [
            'nama_kategori' => 'required|unique:kategori',
        ];

        $message =[
            'nama_kategori' => 'Nama Kategori Masih Kosong',
        ];

        $validator = Validator::make($request->all(), $isi, $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Category::create([
            'nama_kategori'    => $request->nama_kategori,
            'created_at'       => date('Y-m-d H:i:s'),
            'updated_at'       => date('Y-m-d H:i:s'),
        ]);

        alert()->success('Berhasil','Data Berhasil Ditambahkan');
        return redirect('/kategori');

    }

    public function update(Request $request, $id)
    {
        $kategori = Category::find($id);
 
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->updated_at    = date('Y-m-d H:i:s');
         
        $kategori->save();

        alert()->success('Berhasil','Data Berhasil Diubah');
        return redirect('/kategori');
    }

    public function destroy($id)
    {
        $kategori = Category::find($id);
 
        $kategori->delete();

        alert()->info('Info','Data Telah Dihapus');
        return redirect('/kategori');
    }
}
