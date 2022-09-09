@extends('adminlte::page')

@section('title', 'Edit Kode Akun')

@section('content_header')
<h1 class="m-0 text-dark">Edit Kode Akun</h1>
@stop

@section('content')
<form action="{{route('kode-akun.update', $kodeAkun)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label>Kode Akun</label>
                        <input type="text" class="form-control @error('kode_akun') is-invalid @enderror" placeholder="Nama Kode Akun" name="kode_akun" value="{{$kodeAkun->kode_akun ?? old('kode_akun')}}">
                        @error('kode_akun') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama Akun</label>
                        <input type="text" class="form-control @error('nama_akun') is-invalid @enderror" placeholder="Nama Kode Akun" name="nama_akun" value="{{$kodeAkun->nama_akun ?? old('nama_akun')}}">
                        @error('nama_akun') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea rows="5" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{$kodeAkun->keterangan ?? old('keterangan')}}">{{$kodeAkun->keterangan ?? old('keterangan')}}</textarea>
                        @error('keterangan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('kode-akun.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @stop