@extends('adminlte::page')

@section('title', 'Data Kas Masuk')

@section('content_header')
<h1 class="m-0 text-dark">Data Kas Masuk</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                @can('kas-masuk-create')
                <a href="{{route('kas-masuk.create')}}" class="btn btn-primary mb-2">
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
                        @foreach($kasMasuk as $key => $masuk)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$masuk->tgl_transaksi}}</td>
                            <td>{{$masuk->jenis_kas}}</td>
                            <td>@rupiah($masuk->jumlah_masuk)</td>
                            <td>{{$masuk->kodeAkun->kode_akun}} || {{$masuk->kodeAkun->nama_akun}}</td>
                            <td>{{$masuk->keterangan}}</td>
                            <td>@can('kas-masuk-edit')
                                <a href="{{route('kas-masuk.edit', $masuk)}}" class="btn btn-primary btn-xs">
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