@extends('layouts.user')

@section ('title')
Bayar Pembelian
@endsection

@section ('content')
<br>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h6 class="text-center">
                @forelse($anggota as $detailAnggota)
                Bayar ke!
                <h6 class="text-center text-info"><strong>{{$detailAnggota->nama}}<br />
                        {{$detailAnggota->no_anggota}}</strong>
                </h6>

            </h6>
            <br />
            <form action="{{ route('anggota.bayar.store') }}" method="POST">
                @csrf

                <label class="form-label">Nominal Bayar</label>
                <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input class="form-control" type="number" name="nominal_bayar" min="500" max="{{Auth::user()->saldo}}" value="500" aria-describedby="basic-addon1" required>
                </div>

                <input class="form-control" type="hidden" name="penerimaID" value="{{$detailAnggota->id}}" required>
                <input class="form-control" type="hidden" name="namaPenerima" value="{{$detailAnggota->nama}}" required>
                <input class="form-control" type="hidden" name="saldoPenerima" value="{{$detailAnggota->saldo}}" required>

                <div class="alert alert-warning">
                    <div class="media">
                        <div class="icon icon-40 bg-white text-success mr-2 rounded-circle"></div>
                        <div class="media-inner">
                            <h6 class="text-center">
                                <small>Saldo Kamu</small><br />
                                <small><b>@rupiah(Auth::user()->saldo)</b></small>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="form-group basic">
                    <input type="submit" class="btn btn-primary w-100 d-flex align-items-center justify-content-center" value="Bayar">
                </div>
            </form>
            @empty
            <div class="alert alert-warning">
                <div class="media">
                    <div class="icon icon-40 bg-white text-success mr-2 rounded-circle"></div>
                    <div class="media-inner">
                        <h1 class="text-center">
                            <small>Kode QR tidak ditemukan</small>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="form-group basic">
                <a href="{{route('anggota.bayar.index')}}" class="btn btn-warning w-100 d-flex align-items-center justify-content-center">Scan Ulang</a>
            </div>
            @endforelse

        </div>
    </div>
</div>
@endsection