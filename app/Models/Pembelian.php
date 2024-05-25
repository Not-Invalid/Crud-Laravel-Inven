<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Pembelian extends Model
{
    use HasFactory;
 
    protected $primaryKey = 'id_pembelian';
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'jenis_barang',
        'jumlah',
        'harga',
        'total'
    ];
}