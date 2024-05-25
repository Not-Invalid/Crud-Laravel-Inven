<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pemakaian;
use App\Models\Barang;
use App\Models\Ruangan;

class PemakaianController extends Controller
{

    public function index()
    {
        $pemakaian = Pemakaian::with('ruangan')->orderBy('id_pemakaian', 'DESC')->get();
        return view('pemakaian.index', compact('pemakaian'));
    }

    public function tambah()
    {
        $barangs = Barang::all();
        $ruangan = Ruangan::all();
        return view('pemakaian.tambah', compact('barangs', 'ruangan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|exists:barangs,kode_barang',
            'id_ruangan' => 'required|exists:ruangans,id_ruangan',
            'jumlah_pakai' => 'required|integer|min:1',
            'tanggal_pakai' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $barang = Barang::find($request->kode_barang);

        if ($request->jumlah_pakai > $barang->jumlah) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Jumlah pakai melebihi jumlah barang yang tersedia']);
        }

        $barang->jumlah -= $request->jumlah_pakai;
        $barang->save();

        Pemakaian::create($request->all());

        return redirect()->route('pemakaian.index')->with('success', 'Data Pemakaian Berhasil Ditambahkan');
    }

    public function show(string $id_pemakaian)
    {
        $pemakaian = Pemakaian::with('ruangan')->findOrFail($id_pemakaian);
        return view('pemakaian.show', compact('pemakaian'));
    }

    public function ubah(string $id_pemakaian)
    {
        $pemakaian = Pemakaian::findOrFail($id_pemakaian);
        $barangs = Barang::all();
        $ruangan = Ruangan::all();
        return view('pemakaian.ubah', compact('pemakaian', 'barangs', 'ruangan'));
    }

    public function update(Request $request, string $id_pemakaian)
    {
        $request->validate([
            'kode_barang' => 'required|exists:barangs,kode_barang',
            'jumlah_pakai' => 'required|integer|min:1',
        ]);

        $pemakaian = Pemakaian::findOrFail($id_pemakaian);
        $barang = Barang::find($request->kode_barang);

        $jumlahPakaiLama = $pemakaian->jumlah_pakai;
        $jumlahPakaiBaru = $request->jumlah_pakai;
        $jumlahBarangTersedia = $barang->jumlah + $jumlahPakaiLama;

        if ($jumlahPakaiBaru > $jumlahBarangTersedia) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Jumlah pakai melebihi jumlah barang yang tersedia']);
        }

        $barang->jumlah = $jumlahBarangTersedia - $jumlahPakaiBaru;
        $barang->save();

        $pemakaian->update($request->all());

        return redirect()->route('pemakaian.index')->with('success', 'Data Pemakaian Berhasil Diubah');
    }

    public function hapus(string $id_pemakaian)
    {
        $pemakaian = Pemakaian::findOrFail($id_pemakaian);

        $barang = Barang::find($pemakaian->kode_barang);
        $barang->jumlah += $pemakaian->jumlah_pakai;
        $barang->save();

        $pemakaian->delete();

        return redirect()->route('pemakaian.index')->with('success', 'Data Pemakaian Berhasil Dihapus');
    }
    public function cetak() {
        $data = Pemakaian::orderBy('id_pemakaian', 'DESC')->get();
        $pdf = Pdf::loadView('pemakaian.cetak', ['data' => $data])->setPaper('a4', 'potrait');
        return $pdf->stream('laporan_pemakaian.pdf');
    }
}