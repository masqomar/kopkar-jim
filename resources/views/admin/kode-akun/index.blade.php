@extends('adminlte::page')

@section('title', 'Data Kode Akun')

@section('content_header')
<h1 class="m-0 text-dark">Data Kode Akun</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                @can('kode-akun-create')
                <a href="{{route('kode-akun.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                @endcan
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Akun</th>
                            <th>Nama Akun</th>
                            <th>Deskripsi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kodeAkun as $key => $kode)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$kode->kode_akun}}</td>
                            <td>{{$kode->nama_akun}}</td>
                            <td>{{$kode->keterangan}}</td>
                            <td>@can('kode-akun-edit')
                                <a href="{{route('kode-akun.edit', $kode)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                @endcan
                                @can('kode-akun-delete')
                                <a href="{{route('kode-akun.destroy', $kode)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                    Delete
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
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush