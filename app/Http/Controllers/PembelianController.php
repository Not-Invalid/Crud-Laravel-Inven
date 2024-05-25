<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Pembelian;
 
class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = Pembelian::orderBy('id_pembelian', 'DESC')->get();
  
        return view('pembelian.index', compact('pembelian'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        return view('pembelian.tambah');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pembelian::create($request->all());
 
        return redirect()->route('pembelian.index')->with('success', 'pembelian Berhasil Ditambahkany');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id_pembelian)
    {
        $pembelian = Pembelian::findOrFail($id_pembelian);
  
        return view('pembelian.show', compact('pembelian'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function ubah(string $id_pembelian)
    {
        $pembelian = Pembelian::findOrFail($id_pembelian);
  
        return view('pembelian.ubah', compact('pembelian'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_pembelian)
    {
        $pembelian = Pembelian::findOrFail($id_pembelian);
  
        $pembelian->update($request->all());
  
        return redirect()->route('pembelian')->with('success', 'pembelian Berhasil Diubahy');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function hapus(string $id_pembelian)
    {
        $pembelian = Pembelian::findOrFail($id_pembelian);
  
        $pembelian->delete();
  
        return redirect()->route('pembelian.index')->with('success', 'pembelian Berhasil Dihapusy');
    }
}