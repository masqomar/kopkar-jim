@extends('layouts.user')

@section ('title')
Simpanan Wajib
@endsection


@section ('content')
<div class="container">
    <div class="element-heading mt-3">
        <h6>
            <font color="#F4A460"> <strong>Simpanan Wajib<strong></font>
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
                    @foreach ($simpananWajib as $wajib)
                    @if($anggotaID == Auth::user()->id)
                    <tr>
                        <td>{{ $wajib->periode_bulan}}</td>
                        <td>{{ $wajib->tanggal_setor}}</td>
                        <td>@rupiah ($wajib->jumlah)</td>
                    </tr>
                    @endif
                    @endforeach

                    @if($anggotaID == Auth::user()->id)
                    <tr>
                        <th colspan="2" class="text-center">Total Simpanan Wajib</th>
                        <td><strong>@rupiah($totalSimpananWajib)</strong></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection