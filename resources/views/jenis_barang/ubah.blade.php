@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="mb-0">Ubah Data Jenis Barang</h1>
    <hr />
    <form action="{{ route('jenis_barang.update', $jenis_barang->id_jenis_barang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Jenis Barang</label>
                <input type="text" name="jenis_barang" class="form-control" value="{{ $jenis_barang->jenis_barang}}" required>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button class="btn btn-success" style="margin-left:20px; margin-top:20px; width:100px;">Ubah</button>
                <a href="{{ route('jenis_barang.index') }}" type="submit" class="btn btn-danger" style="margin-left:10px; margin-top:20px; width:100px;">Kembali</a>
            </div>
        </div>
    </form>
@endsection
