<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'barang';

    protected $fillable = [
        'nama_barang',
        'no_seri',
        'category_id',
        'harga_beli',
        'harga_jual',
        'stok',
        'image',
        'deskripsi',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Barangmasuk()
    {
        return $this->hasMany(Barangmasuk::class);
    }

    public function Barangkeluar()
    {
        return $this->hasMany(Barangkeluar::class);
    }

    public function BarangRusak()
    {
        return $this->hasMany(BarangRusak::class);
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model) {
            $model->no_seri = Barang::where('category_id', $model->category_id)->max('no_seri') + 1;
        });

    }

    const CREARED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
