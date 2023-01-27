<?php

namespace App\Exports;

use App\Models\Barangmasuk;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangmasukExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct($tgl_mulai, $tgl_selesai)
    {
        $this->tgl_mulai = $tgl_mulai;
        $this->tgl_selesai = $tgl_selesai;
    }

    public function query()
    {
        return Barangmasuk::query()->join('barang', 'barang.id', '=', 'barang_masuk.barang_id')
                            ->join('supplier', 'supplier.id', '=', 'barang_masuk.supplier_id')
                            ->select('no_barang_masuk','barang.nama_barang','supplier.nama_supplier','tgl_barang_masuk','harga','jml_barang_masuk','total')
                            ->whereDate('tgl_barang_masuk', '>=', $this->tgl_mulai)
                            ->whereDate('tgl_barang_masuk', '<=', $this->tgl_selesai);
    }

    public function headings(): array
    {
        return ['Kode Barang Masuk','Nama Barang','Nama Supplier','Tanggal Masuk','Harga','Jumlah','Total'];
    }
}
