<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';

    protected $fillable = [
        'no_barang_masuk',
        'barang_id',
        'supplier_id',
        'tgl_barang_masuk',
        'jml_barang_masuk',
        'total',
        'created_at',
        'updated_at',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    const CREARED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
