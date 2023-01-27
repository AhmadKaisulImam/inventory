<?php

namespace App\Exports;

use App\Models\Barangkeluar;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangkeluarExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct($tgl_mulai, $tgl_selesai)
    {
        $this->tgl_mulai = $tgl_mulai;
        $this->tgl_selesai = $tgl_selesai;
    }

    public function query()
    {
        return Barangkeluar::query()->join('barang', 'barang.id', '=', 'barang_keluar.barang_id')
                            ->select('no_barang_keluar','barang.nama_barang','tgl_barang_keluar','harga','jml_barang_keluar','total')
                            ->whereDate('tgl_barang_keluar', '>=', $this->tgl_mulai)
                            ->whereDate('tgl_barang_keluar', '<=', $this->tgl_selesai);
    }

    public function headings(): array
    {
        return ['Kode Barang Keluar','Nama Barang','Tanggal Keluar','Harga','Jumlah','Total'];
    }
}
