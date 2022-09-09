@extends('adminlte::page')

@section('title', 'Data Kas Keluar')

@section('content_header')
<h1 class="m-0 text-dark">Data Kas Keluar</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                @can('kas-keluar-create')
                <a href="{{route('kas-keluar.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                @endcan
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                            <th>Akun</th>
                            <th>Keterangan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kasKeluar as $key => $keluar)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$keluar->tgl_transaksi}}</td>
                            <td>{{$keluar->jenis_kas}}</td>
                            <td>@rupiah($keluar->jumlah_keluar)</td>
                            <td>{{$keluar->kodeAkun->kode_akun}} || {{$keluar->kodeAkun->nama_akun}}</td>
                            <td>{{$keluar->keterangan}}</td>
                            <td>@can('kas-keluar-edit')
                                <a href="{{route('kas-keluar.edit', $keluar)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<script>
    $('#example2').DataTable({
        "responsive": true,
    });
</script>
@endpush