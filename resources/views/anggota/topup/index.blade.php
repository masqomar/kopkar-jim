@extends('layouts.user')

@section ('title')
Top Up Saldo
@endsection

@section ('content')

<div class="container navi">
    <div class="text-center">
        <h6>
            <font color="#F4A460"> <strong>Top Up Saldo JIMPay<strong></font>
        </h6>
    </div>
    <div class="row">
        <div class="col-6">
            <a href="{{route('anggota.topup.cash')}}">
                <img src="{{asset('theme')}}/assets/icons/cash.png" alt="Cash" class="image-icons">
            </a>
            <p class="text-atas">Cash / Transfer</p>
        </div>
        <div class="col-6">
            <a href="{{route('anggota.topup.sukarela')}}">
                <img src="{{asset('theme')}}/assets/icons/sim-sukarela.png" alt="Sukarela" class="image-icons">
            </a>
            <p class="text-atas">Simpanan Sukarela</p>
        </div>
    </div>
</div>
<br>
<div class="text-center">
    <a class="btn btn-sm btn-warning" href="{{route('home')}}" role="button">Kembali</a>
</div>
@endsection