@extends('layouts.user')

@section ('title')
Konfirmasi Top Up
@endsection

@section ('content')
<div class="container">
    <div class="alert alert-warning text-center">
        <div class="media">
            <div class="icon icon-40 bg-white text-success mr-2 rounded-circle"></div>
            <div class="media-inner">
                <h6 class="mb-0 font-weight-normal">
                    <small>
                        Silahkan transfer ke rekening di bawah ini:
                    </small><br>
                    <small><b>4234324234</b></small>
                    <br><br>
                    <small>Sebesar</a> </small><br>
                    <small>Rp. <b>347293847</b></small><br>
                    <small>dan dikirmkan bukti transfer kepada admin</small>
                </h6>
            </div>
        </div>
    </div>
    <a href="https://wa.me/6285790702476" class="btn btn-sm btn-info w-100 d-flex align-items-center justify-content-center">Kirim Bukti Transfer Now!</a>
    <br>
    <a href="{{route('home')}}" class="btn btn-sm btn-danger w-100 d-flex align-items-center justify-content-center">Kembali</a>
</div>
@endsection