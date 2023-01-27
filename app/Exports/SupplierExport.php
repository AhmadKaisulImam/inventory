<?php

namespace App\Exports;

use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SupplierExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Supplier::select("id", "nama_supplier", "alamat", "nomor_telp", "email")->get();
    }

    public function headings(): array
    {
        return ["ID", "Nama Supplier", "Alamat", "No Telp", "Email"];
    }
}
