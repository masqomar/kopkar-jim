@extends('layouts.user')

@section ('title')
Data Riwayat Transaksi
@endsection


@section ('content')
<div class="container">
    <div class="element-heading mt-3">
        <h6>
            <font color="#F4A460"> <strong>Data Riwayat Transaksi<strong></font>
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
                        <th>Jenis</th>
                        <th>Keterangan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($riwayatTransaksiAll as $riwayatTransaksi)
                    @if($riwayatTransaksi->user->id == Auth::user()->id)
                    <tr>
                        <td>{{ $riwayatTransaksi->tanggal}}</td>
                        <td><span class="badge {{ ($riwayatTransaksi->jenis == 'masuk') ? 'bg-success' : 'bg-danger' }} ">{{$riwayatTransaksi->jenis}}</span></td>
                        <td>{{ $riwayatTransaksi->deskripsi}}</td>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{ route('anggota.riwayat-transaksi.show', $riwayatTransaksi->id) }}" role="button">Detail</a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    Halaman : {{ $riwayatTransaksiAll->currentPage() }} <br />
    Jumlah Data : {{ $riwayatTransaksiAll->total() }} <br />
    Data Per Halaman : {{ $riwayatTransaksiAll->perPage() }} <br />


    {{ $riwayatTransaksiAll->links() }}
</div>

@endsection