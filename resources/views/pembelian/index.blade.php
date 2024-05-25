@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Pembelian</h1>
        <a href="{{ route('pembelian.tambah') }}" class="btn btn-success">Tambah Data Pembelian</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table">
        <thead class="table-dark" style="text-align: center; color:whitesmoke;">
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Jumlah Barang</th>
                <th>Harga Barang</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody style="text-align: center">
            @if($pembelian->count() > 0)
                @foreach($pembelian as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->kode_barang }}</td>
                        <td class="align-middle">{{ $rs->nama_barang }}</td>
                        <td class="align-middle">{{ $rs->jenis_barang }}</td>
                        <td class="align-middle">{{ $rs->jumlah }}</td>
                        <td class="align-middle">{{ $rs->harga }}</td>
                        <td class="align-middle">{{ $rs->total }}</td>  
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('pembelian.show', $rs->id_pembelian) }}" type="button" class="btn btn-warning mr-1">Detail</a>
                                <a href="{{ route('pembelian.ubah', $rs->id_pembelian)}}" type="button" class="btn btn-info mx-2" >Ubah</a>
                                <form action="{{ route('pembelian.hapus', $rs->id_pembelian) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Anda Ingin Hapus Pembelian?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger me-2">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Pembelian Tidak Ada</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection