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

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table mb-0">
                <tbody>
                    <tr>
                        <th scope="col">No Anggota</th>
                        <td>{{ Auth::user()->no_anggota }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Nama Anggota</th>
                        <td>{{ Auth::user()->nama }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Produk Simpanan</th>
                        <td>Simpanan Sukarela</td>
                    </tr>
                    @if($anggotaID == Auth::user()->id)
                    <tr>
                        <th scope="col">Total Simpanan Sukarela</th>
                        <td class="text-primary"> @rupiah($saldoSukarela)</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <a class="btn btn-info" href="{{ route('anggota.sim-sukarela.show', $anggotaID) }}" role="button">Detail</a>
        <br>
        <a class="btn btn-warning" href="{{ route('anggota.sim-sukarela.tarik') }}" role="button">Cairkan</a>
    </div>
</div>
@endsection