@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="mb-0">Detail Pemakaian</h1>
    <hr />
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" value="{{ $pemakaian->kode_barang }}" readonly>
        </div>
        <div class="col">
            <label class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="{{ $pemakaian->nama_barang }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Jumlah Pakai</label>
            <input type="number" name="jumlah_pakai" class="form-control" value="{{ $pemakaian->jumlah_pakai }}" readonly>
        </div>
        <div class="col">
            <label class="form-label">Tanggal pakai</label>
            <input type="date" name="tanggal_pakai" class="form-control" value="{{ $pemakaian->tanggal_pakai }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Ruangan</label>
            <input type="text" name="ruangan" class="form-control" value="{{ $pemakaian->ruangan->nama_ruangan }}" readonly>
        </div>
    </div>    
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Keterangan</label>
            <textarea type="text" name="keterangan" class="form-control"style="resize: none; height:100px;" readonly>{{ $pemakaian->keterangan }}</textarea>
        </div>
    </div>

    <div class="row">
        <div class="d-grid">
            <a href="{{ route('pemakaian.index') }}" type="submit" class="btn btn-danger" style="margin-left:20px; margin-top:20px; width: 100px;">Kembali</a>
        </div>
    </div>
@endsection