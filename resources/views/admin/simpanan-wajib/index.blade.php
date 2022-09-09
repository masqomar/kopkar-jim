@extends('adminlte::page')

@section('title', 'Data Simpanan Wajib')

@section('content_header')
<h1 class="m-0 text-dark">Data Simpanan Wajib</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{ route('admin.simpanan-wajib.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-sm btn-warning">Import Simpanan Wajib</button>
        </form>
        <div class="card">
            <div class="card-body">
                @can('simpanan-wajib-create')
                <a href="{{route('admin.simpanan-wajib.export')}}" class="btn btn-primary mb-2">
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
                        @foreach($SimpananWajibAnggota as $key => $simpananWajib)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$simpananWajib->user_id}}</td>
                            <td>{{$simpananWajib->produk_id}}</td>
                            <td>{{$simpananWajib->jumlah}}</td>
                            <td>{{$simpananWajib->periode_bulan}}</td>
                            <td>{{$simpananWajib->periode_tahun}}</td>
                            <td>{{$simpananWajib->tanggal_setor}}</td>
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