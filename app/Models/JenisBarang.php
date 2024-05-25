<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_jenis_barang';
    protected $fillable = [
        'jenis_barang'
    ];

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class, 'id_jenis_barang');
    }
}
