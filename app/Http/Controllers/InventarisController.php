<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Support\Facades\DB;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = DB::table('pemakaians')
            ->join('barangs', 'pemakaians.kode_barang', '=', 'barangs.kode_barang')
            ->join('jenis_barangs', 'barangs.jenis_barang', '=', 'jenis_barangs.jenis_barang')
            ->join('ruangans', 'pemakaians.id_ruangan', '=', 'ruangans.id_ruangan')
            ->select(
                'pemakaians.id_pemakaian as id',
                'pemakaians.kode_barang',
                'pemakaians.nama_barang',
                'jenis_barangs.jenis_barang as jenis_barang',
                'barangs.created_at as tanggal_pembelian',
                'pemakaians.tanggal_pakai as tanggal_pemakaian',
                'ruangans.nama_ruangan as ruangan',
                'pemakaians.keterangan'
            )
            ->get();

        return view('inventaris.index', ['inventaris' => $inventaris]);
    }

    public function cetak()
    {
        $data = DB::table('pemakaians')
            ->join('barangs', 'pemakaians.kode_barang', '=', 'barangs.kode_barang')
            ->join('jenis_barangs', 'barangs.jenis_barang', '=', 'jenis_barangs.jenis_barang')
            ->join('ruangans', 'pemakaians.id_ruangan', '=', 'ruangans.id_ruangan')
            ->select(
                'pemakaians.id_pemakaian as id',
                'pemakaians.kode_barang',
                'pemakaians.nama_barang',
                'jenis_barangs.jenis_barang as jenis_barang',
                'barangs.created_at as tanggal_pembelian',
                'pemakaians.tanggal_pakai as tanggal_pemakaian',
                'ruangans.nama_ruangan as ruangan',
                'pemakaians.keterangan'
            )
            ->orderBy('pemakaians.id_pemakaian', 'DESC')
            ->get();

        $pdf = Pdf::loadView('inventaris.cetak', ['data' => $data])->setPaper('a4', 'portrait');
        return $pdf->stream('laporan_inventaris.pdf');
    }
}
