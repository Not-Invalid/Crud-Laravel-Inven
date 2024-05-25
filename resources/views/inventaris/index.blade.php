@extends('layouts.app')
  
@section('title')
  
@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Daftar Inventaris Barang</h1>
</div>
<hr />
<table class="table">
    <thead class="table-dark" style="text-align: center; color: whitesmoke;">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Tanggal Pembelian</th>
            <th>Tanggal Pemakaian</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody style="text-align: center">
        @if($inventaris->count() > 0)
            @foreach($inventaris as $item)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $item->kode_barang }}</td>
                    <td class="align-middle">{{ $item->nama_barang }}</td>
                    <td class="align-middle">{{ $item->tanggal_pembelian }}</td>
                    <td class="align-middle">{{ $item->tanggal_pemakaian }}</td>
                    <td class="align-middle">{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="6">Data Inventaris Tidak Ada</td>
            </tr>
        @endif
    </tbody>
</table>
@endsection
