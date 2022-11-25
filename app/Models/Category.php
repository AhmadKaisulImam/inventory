<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori'
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    const CREARED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
