<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::orderBy('id_ruangan', 'DESC')->get();

        return view('ruangan.index', compact('ruangan'));
    }

    public function tambah()
    {
        return view('ruangan.tambah');
    }

    public function store(Request $request)
    {
        Ruangan::create($request->all());

        return redirect()->route('ruangan.index')->with('success', 'Data Ruangan Berhasil Ditambahkan');
    }

    public function ubah(string $id_ruangan)
    {
        $ruangan = Ruangan::findOrFail($id_ruangan);

        return view('ruangan.ubah', compact('ruangan'));
    }

    public function update(Request $request, string $id_ruangan)
    {
        $ruangan = Ruangan::findOrFail($id_ruangan);

        $ruangan->update($request->all());

        return redirect()->route('ruangan.index')->with('success', 'Data Ruangan Berhasil Diubah');
    }

    public function hapus(string $id_ruangan)
    {
        $ruangan = Ruangan::findOrFail($id_ruangan);

        $ruangan->delete();

        return redirect()->route('ruangan.index')->with('success', 'Data Ruangan Berhasil Dihapus');
    }

    public function cetak() {
        $data = Ruangan::orderBy('id_ruangan', 'DESC')->get();
        $pdf = Pdf::loadView('ruangan.cetak', ['data' => $data])->setPaper('a4', 'landscape');
        return $pdf->stream('laporan_ruangan.pdf');
    }
}