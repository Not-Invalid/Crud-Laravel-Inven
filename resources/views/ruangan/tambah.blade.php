@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="mb-0">Tambah Ruangan</h1>
    <hr />
    <form action="{{ route('ruangan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-4">
            <div class="col">
                <label class="form-label">Nama Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-success" style="width: 150; margin-left:20px; margin-top:20px; width:100px;">Tambah</button>
                <a href="{{ route('ruangan.index') }}" type="submit" class="btn btn-danger" style="margin-left:10px; margin-top:20px; width:100px;">Kembali</a>
            </div>
        </div>
    </form>
@endsection
