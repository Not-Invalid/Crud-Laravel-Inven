@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="mb-0">Ubah Data Pembelian</h1>
    <hr />
    <form action="{{ route('pembelian.update', $pembelian->id_pembelian) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control" placeholder="Kode pembelian" value="{{ $pembelian->kode_barang }}" required>
            </div>
            <div class="col mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" placeholder="Nama pembelian" value="{{ $pembelian->nama_barang }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Jenis Barang</label>
                <input type="text" name="jenis_barang" class="form-control" placeholder="Jenis pembelian" value="{{ $pembelian->jenis_barang }}" required>
            </div>
            <div class="col mb-3">
                <label class="form-label">Jumlah Barang</label>
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah pembelian" value="{{ $pembelian->jumlah }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Harga Barang</label>
                <input type="text" name="harga" class="form-control" placeholder="Harga pembelian" value="{{ $pembelian->harga }}" required>
            </div>
            <div class="col mb-3">
                <label class="form-label">Total Harga</label>
                <input type="text" name="total" class="form-control" placeholder="Harga pembelian" value="{{ $pembelian->total }}" required>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-success" style="margin-left:20px; margin-top:20px; width:100px">Ubah</button>
                <a href="{{ route('pembelian.index') }}" type="submit" class="btn btn-danger" style="margin-left:10px; margin-top:20px; width:100px;">Kembali</a>
            </div>
        </div>
    </form>
@endsection