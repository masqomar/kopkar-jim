@extends('adminlte::page')

@section('title', 'Data Pembiayaan Anggota')

@section('content_header')
<h1 class="m-0 text-dark">Data Pembiayaan Anggota</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                @can('pembiayaan-create')
                <a href="{{route('pembiayaan.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                @endcan
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Anggota</th>
                            <th>Barang</th>
                            <th>Tgl Pengajuan</th>
                            <th>Catatan</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengajuanAll as $key => $pengajuan)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$pengajuan->kode_pembiayaan}}</td>
                            <td>{{$pengajuan->user_id}}</td>
                            <td>{{$pengajuan->nama_barang}}</td>
                            <td>{{$pengajuan->tanggal_pengajuan}}</td>
                            <td>{{$pengajuan->catatan}}</td>
                            <td>{{$pengajuan->status_pengajuan}}</td>
                            <td>@can('pembiayaan-edit')
                                <a href="{{route('pembiayaan.edit', $pengajuan)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                @endcan
                                @can('pembiayaan-delete')
                                <a href="{{route('pembiayaan.destroy', $pengajuan)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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