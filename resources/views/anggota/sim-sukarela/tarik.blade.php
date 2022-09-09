@extends('layouts.user')

@section ('title')
Tarik Simpanan Sukarela
@endsection

@section ('content')
<div class="container">
    <br>
    <div class="text-center">
        <h6>
            Total Simpanan Sukarela <label class="text-primary">@rupiah($saldoSukarela)</label>
        </h6>
    </div>
    <div class="container">

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

        <div class="row">
            <form action="{{ route('anggota.sim-sukarela.tarikStore') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" class="form-control" name="nominal_tarik" max="{{$saldoSukarela}}" placeholder="Masukan Nominal Penarikan Dana" required>
                </div>
                <div>
                    <label>Keperluan?</label>
                    <textarea rows="3" class="form-control" name="keterangan" placeholder="Isi keterangan keperluan kamyu" required></textarea>
                </div>
        </div>
        <br>
        <div class="alert alert-warning">
            <div class="media">
                <div class="icon icon-40 bg-white text-success mr-2 rounded-circle"></div>
                <div class="media-inner">
                    <h6 class="mb-0 font-weight-normal">
                        <small>Bisa juga penarikan dana secara manual dengan menghubungi nomor admin</small><br>
                        <small>Berlaku di jam <b>08.00 - 16.00 WIB</b></small>
                    </h6>
                </div>
            </div>
        </div>
        <button class="btn btn-sm btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">Tarik Sekarang
        </button>
        <br>
        <a href="{{route('home')}}" class="btn btn-sm btn-danger w-100 d-flex align-items-center justify-content-center">Batal</a>
    </div>
</div>
@endsection