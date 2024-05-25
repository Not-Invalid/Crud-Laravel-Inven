@extends('layouts.app')
  
@section('title')
    Tambah Barang
@endsection
  
@section('contents')
    <h1 class="mb-0">Tambah Barang</h1>
    <hr />
    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-4">
            <div class="col">
                <label class="form-label">Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Jenis Barang</label>
                <select name="jenis_barang" class="form-control">
                    @foreach($jenisBarangs as $jenisBarang)
                        <option value="{{ $jenisBarang->jenis_barang }}">{{ $jenisBarang->jenis_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label class="form-label">Jumlah Barang</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" oninput="calculateTotal()">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Harga Barang</label>
                <input type="text" name="harga_barang" id="harga_barang" class="form-control" oninput="calculateTotal()">
            </div>
            <div class="col">
                <label class="form-label">Total Harga</label>
                <input type="text" name="total_harga" id="total_harga" class="form-control" readonly>
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-success" style="width: 150; margin-left:20px; margin-top:20px; width:100px;">Tambah</button>
                <a href="{{ route('barang.index') }}" type="submit" class="btn btn-danger" style="margin-left:10px; margin-top:20px; width:100px;">Kembali</a>
            </div>
        </div>
    </form>

    <script>
        function calculateTotal() {
            const jumlah = document.getElementById('jumlah').value;
            const harga_barang = document.getElementById('harga_barang').value;
            const total_harga = document.getElementById('total_harga');
            
            const jumlahNumber = parseFloat(jumlah) || 0;
            const hargaNumber = parseFloat(harga_barang) || 0;
            const total = jumlahNumber * hargaNumber;
            total_harga.value = formatRupiah(total);
        }

        function formatRupiah(angka) {
            const format = angka.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 2
            });
            return format;
        }
    </script>
@endsection
