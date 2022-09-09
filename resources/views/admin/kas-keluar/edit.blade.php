@extends('adminlte::page')

@section('title', 'Edit Kas Keluar')

@section('content_header')
<h1 class="m-0 text-dark">Edit Kas Keluar</h1>
@stop

@section('content')
<form action="{{route('kas-keluar.update', $kasKeluar)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label>Tanggal Keluar</label>
                        <input type="date" class="form-control" name="tgl_transaksi" value="{{$kasKeluar->tgl_transaksi}}" readonly>
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
                        <label>Jumlah Keluar</label>
                        <input type="number" class="form-control" name="jumlah_keluar" value="{{$kasKeluar->jumlah_keluar}}" readonly>
                        @error('jumlah_keluar') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea rows="5" class="form-control" name="keterangan">{{$kasKeluar->keterangan}}</textarea>
                        @error('keterangan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('kas-keluar.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @stop