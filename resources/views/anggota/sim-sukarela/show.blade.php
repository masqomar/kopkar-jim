@extends('layouts.user')

@section ('title')
Simpanan Sukarela
@endsection


@section ('content')
<div class="container">
    <div class="element-heading mt-3">
        <h6>
            <font color="#F4A460"> <strong>Simpanan Sukarela<strong></font>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <a class="btn btn-sm btn-warning" href="{{route('home')}}" role="button">Kembali</a>
        </h6>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Periode Bulan</th>
                        <th>Tanggal Setor</th>
                        <th>Nominal Simpanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($simpananSukarela as $sukarela)
                    @if($anggotaID == Auth::user()->id)
                    <tr>
                        <td>{{ $sukarela->periode_bulan}}</td>
                        <td>{{ $sukarela->tanggal_setor}}</td>
                        <td>@rupiah ($sukarela->jumlah)</td>
                    </tr>
                    @endif
                    @endforeach

                    @if($anggotaID == Auth::user()->id)
                    <tr>
                        <th colspan="2" class="text-center">Total Simpanan Sukarela</th>
                        <td><strong>@rupiah($totalSimpananSukarela)</strong></td>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center">Total TopUp JIMPay</th>
                        <td><strong>@rupiah($totalTopUpSukarela)</strong></td>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center">Total Penarikan Simpanan</th>
                        <td>
                            <strong>@rupiah($totalTransaksiTarik)</strong>
                            <a href="{{ route('anggota.sim-sukarela.detailpenarikan') }}" class="btn btn-sm btn-primary w-100 d-flex align-items-center justify-content-center">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center">Saldo Simpanan Sukarela</th>
                        <td><strong>@rupiah($saldoSukarela)</strong></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection