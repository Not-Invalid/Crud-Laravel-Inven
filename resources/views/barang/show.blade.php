@extends('layouts.app')

@section('title')

@section('contents')
    <h1 class="mb-0">Detail Barang</h1>
    <hr />
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" value="{{ $barang->kode_barang }}" readonly>
        </div>
        <div class="col">
            <label class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="{{ $barang->nama_barang }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Jenis Barang</label>
            <input type="text" name="jenis_barang" class="form-control" placeholder="Jenis Barang" value="{{ $barang->jenis_barang }}" readonly>
        </div>
        <div class="col">
            <label class="form-label">Jumlah Barang</label>
            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Barang" value="{{ $barang->jumlah }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Harga Barang</label>
            <input type="text" name="harga_barang" class="form-control" placeholder="Harga Barang" value="{{ formatRupiah($barang->harga_barang) }}" readonly>
        </div>
        <div class="col">
            <label class="form-label">Total Harga</label>
            <input type="text" name="total_harga" class="form-control" placeholder="Harga Barang" value="{{ formatRupiah($barang->total_harga) }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="d-grid">
            <a href="{{ route('barang.index') }}" type="submit" class="btn btn-danger" style="margin-left:20px; margin-top:20px; width: 100px;">Kembali</a>
        </div>
    </div>
@endsection
