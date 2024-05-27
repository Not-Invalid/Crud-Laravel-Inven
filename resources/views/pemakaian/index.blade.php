@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Daftar Pemakaian</h1>
        <div>
            <a href="{{ route('pemakaian.tambah') }}" class="btn btn-success me-2"><i class="fas fa-plus" style="margin-right: 8px"></i>Tambah Barang</a>
            @if(auth()->user() && auth()->user()->role === 'Admin')
                <a href="{{ route('pemakaian.cetak') }}" class="btn btn-success"><i class="fas fa-download" style="margin-right: 8px"></i>Download Laporan</a>
            @endif
        </div>
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
                <th>Jumlah Pakai</th>
                <th>Tanggal Pakai</th>
                <th>Ruangan</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody style="text-align: center">
            @if($pemakaian->count() > 0)
                @foreach($pemakaian as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->kode_barang }}</td>
                        <td class="align-middle">{{ $rs->nama_barang }}</td>
                        <td class="align-middle">{{ $rs->jumlah_pakai }}</td>
                        <td class="align-middle">{{ $rs->tanggal_pakai }}</td>
                        <td class="align-middle">{{ $rs->ruangan->nama_ruangan}}</td>
                        <td class="align-middle">{{ $rs->keterangan }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('pemakaian.show', $rs->id_pemakaian) }}" type="button" class="btn btn mr-1" style="background: #fb8500; color:#fff;"><i class="fas fa-circle-info"></i> Detail</a>
                                <a href="{{ route('pemakaian.ubah', $rs->id_pemakaian)}}" type="button" class="btn btn-info mx-2"><i class="fas fa-edit"></i> Ubah</a>
                                <form action="{{ route('pemakaian.hapus', $rs->id_pemakaian) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Anda Ingin Hapus pemakaian?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger me-2"><i class="fas fa-trash-alt"></i> Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Data Pemakaian Tidak Ada</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection