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

        return view('admin.master.supplier.supplier', \compact('supplier'));
    }

    public function create()
    {
        return view('admin.master.supplier.addsupplier');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_supplier' => 'required|min:6|max:256',
            'alamat'        => 'required|unique:supplier|min:8|max:256',
            'nomor_telp'    => 'required|unique:supplier|min:11|max:13',
            'email'         => 'required|unique:supplier|email:dns|max:256'
        ]);

        Supplier::create($validasi);

        // alert()->success('Berhasil','Data Berhasil Ditambahkan');
        toast('Data Berhasil Dimasukan', 'success');
        return redirect('/supplier');
    }

    public function edit(Supplier $supplier)
    {
        return \view('admin.master.supplier.editsupplier',[
            'supplier' => $supplier
        ]);
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);

        $supplier = [
            'nama_supplier' => 'required|min:6|max:256',
            'alamat'        => 'required|min:8|max:256',
            'nomor_telp'    => 'required|min:11|max:13',
            'email'         => 'required|email:dns|max:256'
        ];

        $validasi = $request->validate($supplier);

        Supplier::where('id', $id)
                ->update($validasi);

        \toast()->success('Berhasil', 'Data Berhasil Diubah');
        return \redirect('/supplier');
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
 
        $supplier->delete();

        \toast()->info('Info','Data Telah Dihapus');
        return redirect('/supplier');
    }

}
