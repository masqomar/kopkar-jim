@extends('layouts.user')

@section ('title')
Pengajuan Pembiayaan
@endsection

@section ('content')

<div class="container">
    <br>

    <div class="row">

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('anggota.pembiayaan.store') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <label class="input-group">Kode Pengajuan</label>
                <input type="text" class="form-control" name="kode_pembiayaan" value="{{$kodeOtomatis}}" required readonly>
            </div>

            <div class="input-group mb-3">
                <label class="input-group">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" placeholder="Tuliskan nama barang" required>
            </div>

            <div class="input-group mb-3">
                <label class="input-group">Spesifikasi Barang</label>
                <input type="text" class="form-control" name="spek_barang" placeholder="Tuliskan spek barang">
            </div>

            <div class="input-group mb-3">
                <label class="input-group">Catatan</label>
                <textarea type="text" class="form-control" name="catatan" placeholder="Tuliskan catatan sesuai kebutuhan kamu"></textarea>
            </div>
    </div>

    <button class="btn btn-sm btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">Ajukan Sekarang!
    </button>
    <br>
    <a href="{{route('home')}}" class="btn btn-sm btn-danger w-100 d-flex align-items-center justify-content-center">Batal</a>
</div>
@endsection