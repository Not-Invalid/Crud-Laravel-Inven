@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="mb-0">Ubah Data Ruangan</h1>
    <hr />
    <form action="{{ route('ruangan.update', $ruangan->id_ruangan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control" value="{{ $ruangan->nama_ruangan}}" required>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button class="btn btn-success" style="margin-left:20px; margin-top:20px; width:100px;">Ubah</button>
                <a href="{{ route('ruangan.index') }}" type="submit" class="btn btn-danger" style="margin-left:10px; margin-top:20px; width:100px;">Kembali</a>
            </div>
        </div>
    </form>
@endsection
