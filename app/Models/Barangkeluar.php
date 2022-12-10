<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barangkeluar extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'barang_keluar';

    protected $fillable = [
        'no_barang_keluar',
        'barang_id',
        'tgl_barang_keluar',
        'jml_barang_keluar',
        'total',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    const CREARED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
