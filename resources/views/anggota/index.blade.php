@extends('layouts.user')

@section('content')
@can('anggota-menu')
<div class="backnavi">
    <br>
    <div class="text-center">
        <p>
            <font color="#FFFFFF"> Welcome back {{Auth::user()->nama}}!</font><br>
            <font color="#FFFFFF"> @rupiah(Auth::user()->saldo)</font>
        </p>
    </div>

    <div class="container navi">
        <div class="row">
            <div class="col-4">
                <a href="{{ route('anggota.bayar.index') }}">
                    <img src="{{asset('theme')}}/assets/icons/scan.png" alt="Bayar" class="image-icons">
                </a>
                <p class="text-atas">Scan</p>
            </div>
            <div class="col-4">
                <a href="{{ route('anggota.topup.index') }}">
                    <img src="{{asset('theme')}}/assets/icons/tarik.png" alt="TopUp" class="image-icons">
                </a>
                <p class="text-atas">TopUp</p>
            </div>
            <div class="col-4">
                <a href="{{ route('anggota.transfer.index') }}">
                    <img src="{{asset('theme')}}/assets/icons/tf.png" alt="TopUp" class="image-icons">
                </a>
                <p class="text-atas">Transfer</p>
            </div>
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
                    <a href="{{route('anggota.sim-wajib.index')}}">
                        <img src="{{asset('theme')}}/assets/icons/sim-wajib.png" class="image-icons">
                    </a>
                    <p class="text-atas">Simpanan Wajib</p>
                </div>
                <div class="col-4">
                    <a href="{{route('anggota.sim-sukarela.index')}}">
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
                    <a data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <img src="{{asset('theme')}}/assets/icons/more.png" class="image-icons">
                    </a>
                    <p class="text-atas">More</p>
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
        <a href="{{ route('anggota.riwayat-transaksi.index') }}">
            Lihat semua
        </a>
        <br>
        @forelse ($riwayatTransaksiAnggota as $riwayatTransaksi)
        @if($riwayatTransaksi->user->id == Auth::user()->id)
        <div class="card border-success mb-1">
            <div class="card-header badge {{ ($riwayatTransaksi->jenis == 'masuk') ? 'bg-success' : 'bg-danger' }}">{{$riwayatTransaksi->jenis}}</div>
            <div class="card-body badge {{ ($riwayatTransaksi->jenis == 'masuk') ? 'bg-success' : 'bg-danger' }}">
                <h5 class="card-title">@rupiah($riwayatTransaksi->kredit)</h5>
                <p class="card-text">{{$riwayatTransaksi->deskripsi}}</p>
            </div>
        </div>
        @endif
        @empty
        <div class="alert alert-danger text-center col-md-4">
            Belum ada riwayat transaksi
        </div>
        @endforelse
    </div>

    <!-- MODAL PAGE -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <font size="4" color="grey" style="font-weight:bold">Produk Kami</font>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-4">
                                <a href="linkproduk">
                                    <img src="{{asset('theme')}}/assets/icons/pendidikan.png" class="image-icons">
                                </a>
                                <p class="text-atas">Tabungan Pendidikan</p>
                            </div>
                            <div class="col-4">
                                <a href="linkproduk">
                                    <img src="{{asset('theme')}}/assets/icons/nikah.png" class="image-icons">
                                </a>
                                <p class="text-atas">Tabungan Nikah</p>
                            </div>
                            <div class="col-4">
                                <a href="linkproduk">
                                    <img src="{{asset('theme')}}/assets/icons/qurban.png" class="image-icons">
                                </a>
                                <p class="text-atas">Tabungan Qurban</p>
                            </div>

                            <div class="col-4">
                                <a href="linkproduk">
                                    <img src="{{asset('theme')}}/assets/icons/shu.png" class="image-icons">
                                </a>
                                <p class="text-atas">SHU</p>
                            </div>
                        </div>
                    </div>
                    <br />
                    <font size="4" color="grey" style="font-weight:bold">Pembayaran</font>
                    <hr>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-4">
                                <a href="linkproduk">
                                    <img src="{{asset('theme')}}/assets/icons/token.png" class="image-icons">
                                </a>
                                <p class="text-atas">Tagihan</p>
                            </div>
                            <div class="col-4">
                                <a href="linkproduk">
                                    <img src="{{asset('theme')}}/assets/icons/pdam.png" class="image-icons">
                                </a>
                                <p class="text-atas">PDAM</p>
                            </div>
                            <div class="col-4">
                                <a href="linkproduk">
                                    <img src="{{asset('theme')}}/assets/icons/kredit.png" class="image-icons">
                                </a>
                                <p class="text-atas">Kredit</p>
                            </div>
                        </div>
                    </div>
                    <br />
                    <font size="4" color="grey" style="font-weight:bold">TopUp e-Wallet</font>
                    <hr>
                    <div class="container text-center">
                        <div class="row">

                            <div class="col-4">
                                <a href="linkproduk">
                                    <img src="{{asset('theme')}}/assets/icons/kredit.png" class="image-icons">
                                </a>
                                <p class="text-atas">Gopay</p>
                            </div>
                            <div class="col-4">
                                <a href="linkproduk">
                                    <img src="{{asset('theme')}}/assets/icons/kredit.png" class="image-icons">
                                </a>
                                <p class="text-atas">Dana</p>
                            </div>
                            <div class="col-4">
                                <a href="linkproduk">
                                    <img src="{{asset('theme')}}/assets/icons/kredit.png" class="image-icons">
                                </a>
                                <p class="text-atas">Ovo</p>
                            </div>
                            <div class="col-4">
                                <a href="linkproduk">
                                    <img src="{{asset('theme')}}/assets/icons/kredit.png" class="image-icons">
                                </a>
                                <p class="text-atas">LinkAja</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@endcan
@endsection