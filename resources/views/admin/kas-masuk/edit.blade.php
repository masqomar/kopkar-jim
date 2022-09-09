@extends('adminlte::page')

@section('title', 'Edit Kas Masuk')

@section('content_header')
<h1 class="m-0 text-dark">Edit Kas Masuk</h1>
@stop

@section('content')
<form action="{{route('kas-masuk.update', $kasMasuk)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tgl_transaksi" value="{{$kasMasuk->tgl_transaksi}}" readonly>
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
                        <input type="number" class="form-control" name="jumlah_masuk" value="{{$kasMasuk->jumlah_masuk}}" readonly>
                        @error('jumlah_masuk') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea rows="5" class="form-control" name="keterangan">{{$kasMasuk->keterangan}}</textarea>
                        @error('keterangan') <span class="text-danger">{{$message}}</span> @enderror
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