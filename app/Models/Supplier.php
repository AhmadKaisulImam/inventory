<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';

    protected $fillable = [
        'nama_supplier',
        'alamat',
        'nomor_telp',
        'email',
        'created_at',
        'updated_at',
    ];

    public function barangmasuk()
    {
        return $this->hasMany(Barangmasuk::class);
    }

    const CREARED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
