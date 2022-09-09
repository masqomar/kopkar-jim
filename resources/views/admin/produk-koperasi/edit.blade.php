@extends('adminlte::page')

@section('title', 'Edit Produk')

@section('content_header')
<h1 class="m-0 text-dark">Edit Produk</h1>
@stop

@section('content')
<form action="{{route('produk-koperasi.update', $produkKoperasi)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" placeholder="Nama jenis produk" name="nama_produk" value="{{$produkKoperasi->nama_produk ?? old('nama_produk')}}">
                        @error('nama_produk') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama Jenis Produk</label>
                        <select name="jenis_produk_id" class="form-control">
                            @foreach ($jenisProduk as $jenis)
                            <option value="{{$jenis->id}}">{{$jenis->jenis_produk}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea rows="5" class="form-control @error('desk_produk') is-invalid @enderror" placeholder="Isi dengan deskripsi produk koperasi" name="desk_produk">{{$produkKoperasi->desk_produk}}</textarea>
                        @error('desk_produk') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class=" form-group">
                        <label class="form-label">Poto Produk:</label>
                        <input type="file" name="poto_produk" class="form-control @error('poto_produk') is-invalid @enderror">

                        @error('poto_produk')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('produk-koperasi.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @stop