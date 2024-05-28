<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class JenisBarangController extends Controller
{
    public function index()
    {
        $jenis_barang = JenisBarang::orderBy('id_jenis_barang', 'DESC')->get();

        return view('jenis_barang.index', compact('jenis_barang'));
    }

    public function tambah()
    {
        return view('jenis_barang.tambah');
    }

    public function store(Request $request)
    {
        JenisBarang::create($request->all());

        return redirect()->route('jenis_barang.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function ubah(string $id_jenis_barang)
    {
        $jenis_barang = JenisBarang::findOrFail($id_jenis_barang);

        return view('jenis_barang.ubah', compact('jenis_barang'));
    }

    public function update(Request $request, string $id_jenis_barang)
    {
        $jenis_barang = JenisBarang::findOrFail($id_jenis_barang);

        $jenis_barang->update($request->all());

        return redirect()->route('jenis_barang.index')->with('success', 'Data Berhasil Diubah');
    }

    public function hapus(string $id_jenis_barang)
    {
        $jenis_barang = JenisBarang::findOrFail($id_jenis_barang);

        $jenis_barang->delete();

        return redirect()->route('jenis_barang.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak() {
        $data = JenisBarang::orderBy('id_jenis_barang', 'DESC')->get();
        $pdf = Pdf::loadView('jenis_barang.cetak', ['data' => $data])->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_jenisbarang.pdf');
    }
}