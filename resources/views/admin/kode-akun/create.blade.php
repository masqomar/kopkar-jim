@extends('adminlte::page')

@section('title', 'Tambah Kode Akun')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Kode Akun</h1>
@stop

@section('content')
<form action="{{route('kode-akun.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label>Kode Akun</label>
                        <input type="text" class="form-control @error('kode_akun') is-invalid @enderror" placeholder="Nama Kode Akun" name="kode_akun" value="{{old('kode_akun')}}">
                        @error('kode_akun') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama Kode Akun</label>
                        <input type="text" class="form-control @error('nama_akun') is-invalid @enderror" placeholder="Nama Kode Akun" name="nama_akun" value="{{old('nama_akun')}}">
                        @error('nama_akun') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea rows="5" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Isi dengan deskripsi Kode Akun" name="keterangan" value="{{old('keterangan')}}"></textarea>
                        @error('keterangan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('jenis-produk.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop