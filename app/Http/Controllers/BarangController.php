<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Barang;
use App\Models\JenisBarang;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::orderBy('kode_barang', 'DESC')->get();
        return view('barang.index', compact('barang'));
    }

    public function tambah()
    {
        $jenisBarangs = JenisBarang::all();
        return view('barang.tambah', compact('jenisBarangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'jumlah' => 'required|numeric',
            'harga_barang' => 'required|numeric',
        ]);

        $total_harga = $request->jumlah * $request->harga_barang;

        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'jumlah' => $request->jumlah,
            'harga_barang' => $request->harga_barang,
            'total_harga' => $total_harga,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang Berhasil Ditambahkan');
    }

    public function show(string $kode_barang)
    {
        $barang = Barang::findOrFail($kode_barang);
        return view('barang.show', compact('barang'));
    }

    public function ubah(string $kode_barang)
    {
        $barang = Barang::findOrFail($kode_barang);
        $jenisBarangs = JenisBarang::all();
        return view('barang.ubah', compact('barang', 'jenisBarangs'));
    }

    public function update(Request $request, string $kode_barang)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'jumlah' => 'required|numeric',
            'harga_barang' => 'required|numeric',
        ]);

        $barang = Barang::findOrFail($kode_barang);

        $total_harga = $request->jumlah * $request->harga_barang;

        $barang->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'jumlah' => $request->jumlah,
            'harga_barang' => $request->harga_barang,
            'total_harga' => $total_harga,
            'updated_at' => now(),
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang Berhasil Diubah');
    }

    public function hapus(string $kode_barang)
    {
        $barang = Barang::findOrFail($kode_barang);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang Berhasil Dihapus');
    }

    public function cetak() {
        $data = Barang::orderBy('kode_barang', 'DESC')->get();
        $pdf = Pdf::loadView('barang.cetak', ['data' => $data])->setPaper('a4', 'landscape');
        return $pdf->stream('laporan_barang.pdf');
    }
}
