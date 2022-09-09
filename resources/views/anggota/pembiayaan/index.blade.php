@extends('layouts.user')

@section ('title')
Pengajuan Pembiayaan
@endsection


@section ('content')
<div class="container">
    <div class="element-heading mt-3">
        <h6>
            <font color="#F4A460"> <strong>Pengajuan Pembiayaan<strong></font>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <a class="btn btn-sm btn-warning" href="{{route('home')}}" role="button">Kembali</a>
        </h6>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Kode Pengajuan</th>
                        <th>Nama Barang</th>
                        <th>Status</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengajuanAll as $pengajuan)
                    @if($anggotaID == Auth::user()->id)
                    <tr>
                        <td>{{ $pengajuan->kode_pembiayaan}}</td>
                        <td>{{ $pengajuan->nama_barang}}</td>
                        <td>{{ $pengajuan->status_pengajuan}}</td>
                        @if ($pengajuan->status_pengajuan === 'Disetujui')
                        <td>
                            <a class="btn btn-sm btn-info" href="" role="button">Detail</a>
                        </td>
                        @endif
                        @if ($pengajuan->status_pengajuan === 'Diproses')
                        <td>
                            <a class="btn btn-sm btn-danger" href="" role="button">Batalkan</a>
                        </td>
                        @endif
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection