@extends('layouts.app')

@section('title')

@section('contents')
    <h1 class="mb-0">Tambah Data Pemakaian</h1>
    <hr />
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('pemakaian.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-4">
            <div class="col">
                <label class="form-label">Kode Barang</label>
                <select name="kode_barang" id="kode_barang" class="form-control">
                    <option value="">Pilih Kode Barang</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->kode_barang }}" data-nama="{{ $barang->nama_barang }}" {{ old('kode_barang') == $barang->kode_barang ? 'selected' : '' }}>
                            {{ $barang->kode_barang }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ old('nama_barang') }}" readonly>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Jumlah Pakai</label>
                <input type="number" name="jumlah_pakai" class="form-control" value="{{ old('jumlah_pakai') }}">
            </div>
            <div class="col">
                <label class="form-label">Tanggal Pakai</label>
                <input type="date" name="tanggal_pakai" class="form-control" value="{{ old('tanggal_pakai') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Ruangan</label>
                <select name="id_ruangan" class="form-control">
                    <option value="">Pilih Ruangan</option>
                    @foreach($ruangan as $ruang)
                        <option value="{{ $ruang->id_ruangan }}" {{ old('id_ruangan') == $ruang->id_ruangan ? 'selected' : '' }}>
                            {{ $ruang->nama_ruangan }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" style="resize: none; height: 100px;">{{ old('keterangan') }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-success" style="margin-left:20px; margin-top:20px; width:100px">Tambah</button>
                <a href="{{ route('pemakaian.index') }}" class="btn btn-danger" style="margin-left:10px; margin-top:20px; width:100px">Kembali</a>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('kode_barang').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var namaBarang = selectedOption.getAttribute('data-nama');
            document.getElementById('nama_barang').value = namaBarang;
        });
    </script>
@endsection
