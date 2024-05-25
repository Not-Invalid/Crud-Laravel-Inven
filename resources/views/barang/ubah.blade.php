@extends('layouts.app')

@section('title', 'Ubah Data Barang')

@section('contents')
    <h1 class="mb-0">Ubah Data Barang</h1>
    <hr />
    <form action="{{ route('barang.update', $barang->kode_barang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" value="{{ $barang->kode_barang }}" required>
            </div>
            <div class="col mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="{{ $barang->nama_barang }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Jenis Barang</label>
                <select name="jenis_barang" class="form-control" required>
                    @foreach($jenisBarangs as $jenisBarang)
                        <option value="{{ $jenisBarang->jenis_barang }}" {{ $jenisBarang->id == $barang->id_jenis_barang ? 'selected' : '' }}>
                            {{ $jenisBarang->jenis_barang }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-3">
                <label class="form-label">Jumlah Barang</label>
                <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah Barang" value="{{ $barang->jumlah }}" oninput="calculateTotal()" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label">Harga Barang</label>
                <input type="text" id="harga_barang" name="harga_barang" class="form-control" placeholder="Harga Barang" value="{{ $barang->harga_barang }}" oninput="calculateTotal()" required>
            </div>
            <div class="col">
                <label class="form-label">Total Harga</label>
                <input type="text" id="total_harga" name="total_harga" class="form-control" placeholder="Harga Barang" value="{{ formatRupiah($barang->total_harga) }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-success" style="margin-left:20px; margin-top:20px; width:100px;">Ubah</button>
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