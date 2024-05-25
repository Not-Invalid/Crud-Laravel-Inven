<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $primaryKey = 'kode_barang';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'jenis_barang',
        'jumlah',
        'harga_barang',
        'total_harga',
        'updated_at',
        'created_at'
    ];

    public function pemakaian()
    {
        return $this->hasMany(Pemakaian::class, 'kode_barang', 'kode_barang');
    }
}
