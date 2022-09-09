@extends('adminlte::page')

@section('title', 'Data Jenis Produk')

@section('content_header')
<h1 class="m-0 text-dark">Data Jenis Produk</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                @can('jenis-produk-create')
                <a href="{{route('jenis-produk.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                @endcan
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis Produk</th>
                            <th>Deskripsi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jenisProduk as $key => $jenis)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$jenis->jenis_produk}}</td>
                            <td>{{$jenis->desk_jenis}}</td>
                            <td>@can('jenis-produk-edit')
                                <a href="{{route('jenis-produk.edit', $jenis)}}" class="btn btn-primary btn-xs">
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