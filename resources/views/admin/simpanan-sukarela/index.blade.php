@extends('adminlte::page')

@section('title', 'Data Simpanan Sukarela')

@section('content_header')
<h1 class="m-0 text-dark">Data Simpanan Sukarela</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{ route('admin.simpanan-sukarela.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-sm btn-warning">Import Simpanan Sukarela</button>
        </form>
        <div class="card">
            <div class="card-body">
                @can('simpanan-sukarela-create')
                <a href="{{route('admin.simpanan-sukarela.export')}}" class="btn btn-primary mb-2">
                    Export
                </a>
                @endcan
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Anggota</th>
                            <th>Simpanan</th>
                            <th>Jumlah</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Tanggal Setor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($SimpananSukarelaAnggota as $key => $SimpananSukarela)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$SimpananSukarela->user_id}}</td>
                            <td>{{$SimpananSukarela->produk_id}}</td>
                            <td>{{$SimpananSukarela->jumlah}}</td>
                            <td>{{$SimpananSukarela->periode_bulan}}</td>
                            <td>{{$SimpananSukarela->periode_tahun}}</td>
                            <td>{{$SimpananSukarela->tanggal_setor}}</td>
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
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });
</script>
@endpush