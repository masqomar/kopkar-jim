@extends('layouts.user')

@section('content')
@can('mitra-menu')
<div class="backnavi">
    <br>
    <div class="text-center">
        <p>
            <font color="#FFFFFF"> Welcome back {{Auth::user()->nama}}!</font><br>
            {!! QrCode::size(50)->generate((Auth::user()->no_anggota)); !!}
        </p>
    </div>

    <div class="container navi">
        <div class="row">
            <div class="col-12">
                <h3>
                    <font color="black" style="font-weight:bold"> @rupiah(Auth::user()->saldo)</font>
                </h3>
            </div>
            <div class="text-center">
                <a href="{{ route('mitra.tarik.index') }}" class="btn btn-primary">
                    Cairkan
                </a>
            </div>
            <br>
            <br>
            <button class="verif">&nbsp;&nbsp; <img src="{{asset('theme')}}/assets/icons/verified.png" style="width: 20px ; height: 20px">&nbsp;&nbsp;Your verified account -> &nbsp;&nbsp; <font color="white">{{Auth::user()->no_anggota}}</font>
            </button>
        </div>
    </div>

    <div class="container p-2">
        <!-- Blank -->
    </div>
    <div class="container p-2">
        <!-- Blank -->
    </div>

    <div class="container p-2 warna">
        <div class="container text-center p-1">
            <div class="row">
                <div class="col-4">
                    <a href="linkto">
                        <img src="{{asset('theme')}}/assets/icons/sim-wajib.png" class="image-icons">
                    </a>
                    <p class="text-atas">Simpanan Wajib</p>
                </div>
                <div class="col-4">
                    <a href="linkto">
                        <img src="{{asset('theme')}}/assets/icons/sim-sukarela.png" class="image-icons">
                    </a>
                    <p class="text-atas">Simpanan Sukarela</p>
                </div>
                <div class="col-4">
                    <a href="linkto">
                        <img src="{{asset('theme')}}/assets/icons/thr.png" class="image-icons">
                    </a>
                    <p class="text-atas">Tabungan Hari Raya</p>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <a href="linkproduk">
                        <img src="{{asset('theme')}}/assets/icons/bayar.png" class="image-icons">
                    </a>
                    <p class="text-atas">JIMPay Later</p>
                </div>
                <div class="col-4">
                    <a href="linkproduk">
                        <img src="{{asset('theme')}}/assets/icons/pembiayaan.png" class="image-icons">
                    </a>
                    <p class="text-atas">Pembiayaan</p>
                </div>
                <div class="col-4">
                    <a href="linkproduk">
                        <img src="{{asset('theme')}}/assets/icons/pembiayaan.png" class="image-icons">
                    </a>
                    <p class="text-atas">Pembiayaan</p>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="container">
        <font size="4" color="grey" style="font-weight:bold">Riwayat Transaksi</font>
        &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp;
        <a href="">
            Lihat semua
        </a>
        <br>
        @foreach ($riwayatTransaksiMitraAll as $riwayatTransaksiMitra)
        <div class="card border-success mb-1">
            <div class="card-header badge {{ ($riwayatTransaksiMitra->jenis == 'masuk') ? 'bg-success' : 'bg-danger' }}">{{$riwayatTransaksiMitra->jenis}}</div>
            <div class="card-body badge {{ ($riwayatTransaksiMitra->jenis == 'masuk') ? 'bg-success' : 'bg-danger' }}">
                @if($riwayatTransaksiMitra->jenis == 'keluar')
                <h5 class="card-title">@rupiah($riwayatTransaksiMitra->kredit)</h5>
                @endif
                @if($riwayatTransaksiMitra->jenis == 'masuk')
                <h5 class="card-title">@rupiah($riwayatTransaksiMitra->debit)</h5>
                @endif
                <p class="card-text">{{$riwayatTransaksiMitra->deskripsi}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
<br>
<br>
@endcan
@endsection