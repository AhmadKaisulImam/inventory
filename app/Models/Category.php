<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori',
        'seri'
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function category()
    {
        return $this->hasMany(BarangRusak::class);
    }

    const CREARED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
