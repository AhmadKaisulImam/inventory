<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'supplier';

    protected $fillable = [
        'nama_supplier',
        'alamat',
        'nomor_telp',
        'email',
    ];

    public function barangmasuk()
    {
        return $this->hasMany(Barangmasuk::class);
    }

    const CREARED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
