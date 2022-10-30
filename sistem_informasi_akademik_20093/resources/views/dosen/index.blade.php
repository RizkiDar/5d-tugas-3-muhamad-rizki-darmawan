@extends('master')
@section('title','Dosen')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10">
            <h3>Daftar Dosen Aktif Fasilkom 2022</h3>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-secondary" href="{{ route('dosen.create')}}">Tambah Data</a>
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
            <th>Photo</th>
            <th>#</th>
            <th>NIDN</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Tempat,Tanggal Lahir</th>
            <th>Aksi</th>
          </tr>
        </thead>
          @foreach ($dosens as $dosen) 
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                  <img src="{{ asset('storage/'.$dosen->photo) }}" width="50px" height="50px">
               </td>
                  <td>{{ $dosen->nidn }}</td>
                  <td>{{ $dosen->nama }}</td>
                  <td>{{ $dosen->jenis_kelamin }}</td>
                  <td>{{ $dosen->alamat }}</td>
                  <td>{{ $dosen->tempat_lahir }} , {{ $dosen->tanggal_lahir }}</td>
                  
                  <td>
                      <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST">
                        <a class="btn btn-sm btn-warning" href="{{ route('dosen.edit', $dosen->id) }}">EDIT</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                      </form>    
                  </td>
              </tr>
          @endforeach
      </table>

@endsection