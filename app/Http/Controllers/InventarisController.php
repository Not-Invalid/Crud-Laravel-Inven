<?php
namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = DB::table('inventaris')
            ->join('barangs', 'inventaris.kode_barang', '=', 'barangs.kode_barang')
            ->leftJoin('pemakaians', 'inventaris.id', '=', 'pemakaians.id_pemakaian')
            ->select(
                'inventaris.kode_barang',
                'barangs.nama_barang',
                'barangs.created_at as tanggal_pembelian',
                'pemakaians.tanggal_pakai as tanggal_pemakaian',
                'pemakaians.keterangan'
            )
            ->get();

        return view('inventaris.index', compact('inventaris'));
    }

};    
