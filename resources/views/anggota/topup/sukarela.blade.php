@extends('layouts.user')

@section ('title')
Top Up Saldo
@endsection

@section ('content')
<div class="container">
    <br>
    <br>
    <br>

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
        <form action="{{ route('anggota.topup.storeSukarela') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text">Rp.</span>
                <input type="number" class="form-control" name="nominal_topup" min="1000" max="{{$sisaSimSukarela}}" placeholder="Masukan Nominal Topup" required>
            </div>
    </div>
    <div class="text-center">@rupiah($sisaSimSukarela)</div>
    <div class="alert alert-warning">
        <div class="media">
            <div class="icon icon-40 bg-white text-success mr-2 rounded-circle"></div>
            <div class="media-inner">
                <h6 class="mb-0 font-weight-normal">
                    <small>Bisa juga topup manual (cash) melalui koperasi di New Building</small><br>
                    <small>Berlaku di jam <b>07.00 - 17.00 WIB</b></small>
                    <br><br>
                    <small>Topup Transfer? <a href="{{route('anggota.topup.cash')}}">Klik aku ya...</a></small>
                </h6>
            </div>
        </div>
    </div>
    <button class="btn btn-sm btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">Top Up Sekarang
    </button>
    <br>
    <a href="{{route('home')}}" class="btn btn-sm btn-danger w-100 d-flex align-items-center justify-content-center">Batal</a>
</div>
@endsection