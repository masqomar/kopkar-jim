@extends('layouts.user')

@section ('title')
Transfer Saldo
@endsection

@section ('content')

<div class="container navi">
    <div class="text-center">
        <h6>
            <font color="#F4A460"> <strong>Transfer Saldo<strong></font>
        </h6>
    </div>
    <div class="row">
        <div class="col-6">
            <a href="{{route('anggota.transfer.scantransfer')}}">
                <img src="{{asset('theme')}}/assets/icons/scan.png" alt="Bayar" class="image-icons">
            </a>
            <p class="text-atas">Scan QR</p>
        </div>
        <div class="col-6">
            <a href="{{route('anggota.transfer.manual')}}">
                <img src="{{asset('theme')}}/assets/icons/cari.png" alt="TopUp" class="image-icons">
            </a>
            <p class="text-atas">Manual</p>
        </div>
    </div>
</div>
<br>
<div class="text-center">
    <a class="btn btn-sm btn-warning" href="{{route('home')}}" role="button">Kembali</a>
</div>
@endsection