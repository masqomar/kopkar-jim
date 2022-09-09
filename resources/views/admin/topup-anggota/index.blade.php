@extends('adminlte::page')

@section('title', 'Data Top Up Anggota')

@section('content_header')
<h1 class="m-0 text-dark">Data Top Up Anggota</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                @can('topup-create')
                <a href="{{route('topup-anggota.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                @endcan
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Anggota</th>
                            <th>Nominal</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topupAnggota as $key => $topup)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$topup->tgl_topup}}</td>
                            <td>{{$topup->user->nama}}</td>
                            <td>@rupiah($topup->nominal_topup)</td>
                            <td>{{$topup->keterangan}}</td>
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