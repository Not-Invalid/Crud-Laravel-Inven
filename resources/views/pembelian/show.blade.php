@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="mb-0">Detail Pembelian</h1>
    <hr />
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" value="{{ $pembelian->kode_barang }}" readonly>
        </div>
        <div class="col">
            <label class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="{{ $pembelian->nama_barang }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Jenis Barang</label>
            <input type="text" name="jenis_barang" class="form-control" placeholder="Jenis Barang" value="{{ $pembelian->jenis_barang }}" readonly>
        </div>
        <div class="col">
            <label class="form-label">Jumlah Barang</label>
            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Barang" value="{{ $pembelian->jumlah }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Harga Satuan</label>
            <input type="text" name="harga" class="form-control" placeholder="Harga Satuan" value="{{ $pembelian->harga }}" readonly>
        </div>
        <div class="col">
            <label class="form-label">Total Harga</label>
            <input type="text" name="total" class="form-control" placeholder="Total Harga" value="{{ $pembelian->total }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="d-grid">
            <a href="{{ route('pembelian.index') }}" type="submit" class="btn btn-danger" style="margin-left:20px; margin-top:20px; width: 100px;">Kembali</a>
        </div>
    </div>
@endsection