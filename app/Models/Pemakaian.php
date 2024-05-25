<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemakaian extends Model
{
    protected $primaryKey = 'id_pemakaian';
    public $incrementing = true;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'jumlah_pakai',
        'tanggal_pakai',
        'id_ruangan',
        'keterangan',
        'updated_at',
        'created_at'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan');
    }

}
