@extends('adminlte::page')

@section('title', 'Edit Jenis Produk')

@section('content_header')
<h1 class="m-0 text-dark">Edit Jenis Produk</h1>
@stop

@section('content')
<form action="{{route('jenis-produk.update', $jenisProduk)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control @error('jenis_produk') is-invalid @enderror" placeholder="Nama jenis produk" name="jenis_produk" value="{{$jenisProduk->jenis_produk ?? old('jenis_produk')}}">
                        @error('jenis_produk') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea rows="5" class="form-control @error('desk_jenis') is-invalid @enderror" name="desk_jenis" value="{{$jenisProduk->desk_jenis ?? old('desk_jenis')}}">{{$jenisProduk->desk_jenis ?? old('desk_jenis')}}</textarea>
                        @error('desk_jenis') <span class="text-danger">{{$message}}</span> @enderror
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