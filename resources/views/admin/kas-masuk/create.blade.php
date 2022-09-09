@extends('adminlte::page')

@section('title', 'Tambah Kas Masuk')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Kas Masuk</h1>
@stop

@section('content')
<form action="{{route('kas-masuk.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" class="form-control @error('tgl_transaksi') is-invalid @enderror" placeholder="Nama Produk" name="tgl_transaksi" value="{{old('tgl_transaksi')}}">
                        @error('tgl_transaksi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama Akun</label>
                        <select name="akun_id" class="form-control">
                            @foreach ($kodeAkun as $akun)
                            <option value="{{$akun->id}}">{{$akun->nama_akun}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Masuk</label>
                        <input type="number" class="form-control @error('jumlah_masuk') is-invalid @enderror" placeholder="Nama Produk" name="jumlah_masuk" value="{{old('jumlah_masuk')}}">
                        @error('jumlah_masuk') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea rows="5" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Isi dengan deskripsi produk koperasi" name="keterangan" value="{{old('keterangan')}}"></textarea>
                        @error('keterangan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('kas-masuk.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop