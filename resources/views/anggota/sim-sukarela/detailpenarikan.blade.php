@extends('layouts.user')

@section ('title')
Detail Penarikan Simpanan Sukarela
@endsection


@section ('content')
<div class="container">
    <div class="element-heading mt-3">
        <h6>
            <font color="#F4A460"> <strong>Detail Penarikan Simpanan Sukarela<strong></font>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <a class="btn btn-sm btn-warning" href="{{route('home')}}" role="button">Kembali</a>
        </h6>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nominal</th>
                        <th>Bukti Transfer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailPenarikanSukarela as $penarikanSukarela)
                    @if($anggotaID == Auth::user()->id)
                    <tr>
                        <td>{{ $penarikanSukarela->tgl_tarik}}</td>
                        <td>@rupiah ($penarikanSukarela->nominal_tarik)</td>
                        <td>
                            <img src="{{ \Storage::url($penarikanSukarela->bukti_transfer) }}" class="rounded" style="width: 50px">
                        </td>
                    </tr>
                    @endif
                    @endforeach

                    @if($anggotaID == Auth::user()->id)
                    <tr>
                        <th colspan="2" class="text-center">Total Penarikan Simpanan Sukarela</th>
                        <td><strong>@rupiah($totakPenarikanSukarela)</strong></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection