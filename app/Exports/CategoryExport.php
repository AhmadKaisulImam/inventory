<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Category::select("id", "nama_kategori", "seri")->get();
    }

    public function headings(): array
    {
        return ["ID", "Nama Kategori", "Seri"];
    }
}
