<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    use HasFactory;

    protected $table = 'brg_keluar';

    protected $fillable = [
        'no_barang_keluar',
        'id_barang',
        'id_user',
        'tgl_barang_keluar',
        'jml_barang_keluar',
        'total',
        'created_at',
        'updated_at',
    ];

    const CREARED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
