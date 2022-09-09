@extends('layouts.user')

@section ('title')
Detail Transaksi
@endsection


@section ('content')
<div class="container">
    <div class="element-heading mt-3">
        <h6>
            <font color="#F4A460"> <strong>Detail Transaksi<strong></font>
        </h6>
    </div>
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
                    @foreach ($detailtransaksi as $detail)
                    <tr>
                        <th scope="col">Tanggal</th>
                        <td> {{$detail->tanggal}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Jenis</th>
                        <td> {{$detail->tipe}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Keterangan</th>
                        <td> {{$detail->deskripsi}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Type</th>
                        <td>
                            <span class="badge {{ ($detail->jenis == 'masuk') ? 'bg-success' : 'bg-danger' }} ">{{$detail->jenis}}</span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Nominal</th>
                        <td>
                            <span class="badge {{ ($detail->jenis == 'masuk') ? 'bg-success' : 'bg-danger' }} ">@rupiah($detail->kredit)</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="text-center">
        <a class="btn btn-warning" href="{{route('anggota.riwayat-transaksi.index')}}" role="button">Kembali</a>
    </div>
</div>
<br>

@endsection