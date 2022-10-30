@extends('master')
@section('title','Matakuliah')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-10">
            <h3>Daftar Matakuliah Tersedia Fasilkom 2022</h3>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-secondary" href="{{ route('matakuliah.create')}}">Tambah Data</a>
        </div>
    </div> 

    <div class="row">
        <div class="col">
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('message') }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Kode Matakuliah</th>
                        <th>Nama Matakuliah</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                      @foreach ($matakuliahs as $matakuliah) 
                          <tr>
                            <th>{{ $loop->iteration }}</th>
                              <td>{{ $matakuliah->kode_mk }}</td>
                              <td>{{ $matakuliah->nama_mk }}</td>
                              <td>
                                  <form action="{{ route('matakuliah.destroy', $matakuliah->id) }}" method="POST">
                                    <a class="btn btn-sm btn-warning" href="{{ route('matakuliah.edit', $matakuliah->id) }}">EDIT</a>
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                  </form>    
                              </td>
                          </tr>
                      @endforeach
                  </table>
            </div>
        </div>
    </div>

@endsection