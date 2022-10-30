@extends('master')
@section('title','Mahasiswa')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10">
            <h3>Daftar Mahasiswa Aktif Fasilkom 2022</h3>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-secondary" href="{{ route('mahasiswa.create')}}">Tambah Data</a>
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

    <table class="table table-striped">
        <thead>
          <tr>

            <th>#</th>
            <th>Photo</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Tempat,Tanggal Lahir</th>
            <th>Aksi</th>
          </tr>
        </thead>
          @foreach ($mahasiswas as $mahasiswa) 
              <tr>
                <th>{{ $loop->iteration }}</th>
                <td>
                  <img src="{{ asset('storage/'.$mahasiswa->photo) }}" width="50px" height="50px">
              </td>
                  <td>{{ $mahasiswa->nidn }}</td>
                  <td>{{ $mahasiswa->nama }}</td>
                  <td>{{ $mahasiswa->jenis_kelamin }}</td>
                  <td>{{ $mahasiswa->alamat }}</td>
                  <td>{{ $mahasiswa->tempat_lahir }} , {{ $mahasiswa->tanggal_lahir }}</td>
                  <td>
                      <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                        <a class="btn btn-sm btn-warning" href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">EDIT</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                      </form>    
                  </td>
              </tr>
          @endforeach
      </table>

@endsection