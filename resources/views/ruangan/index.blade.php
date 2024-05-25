@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Daftar Ruangan</h1>
        <a href="{{ route('ruangan.tambah') }}" class="btn btn-success">Tambah Ruangan</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table">
        <thead class="table-dark" style="text-align: center; color:whitesmoke;">
            <tr>
                <th>No</th>
                <th>Nama Ruangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody style="text-align: center">
            @if($ruangan->count() > 0)
                @foreach($ruangan as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->nama_ruangan }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('ruangan.ubah', $rs->id_ruangan)}}" type="button" class="btn btn-info mx-2"><i class="fas fa-edit"></i> Ubah</a>
                                <form action="{{ route('ruangan.hapus', $rs->id_ruangan) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Anda Ingin Hapus Ruangan?')">
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
                    <td class="text-center" colspan="8">Data Tidak Ada</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
