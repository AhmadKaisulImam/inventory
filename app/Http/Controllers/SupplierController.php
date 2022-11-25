<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier   = Supplier::all();

        return view('admin.master.supplier', \compact('supplier'));
    }

    public function store(Request $request)
    {
        Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'alamat'        => $request->alamat,
            'nomor_telp'    => $request->nomor_telp,
            'email'         => $request->email,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);

        // alert()->success('Berhasil','Data Berhasil Ditambahkan');
        toast('Data Berhasil Dimasukan', 'success');
        return redirect('/supplier');
    }

}
