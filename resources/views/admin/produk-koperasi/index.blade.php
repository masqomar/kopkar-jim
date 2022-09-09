@extends('adminlte::page')

@section('title', 'Data Produk')

@section('content_header')
<h1 class="m-0 text-dark">Data Produk</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                @can('produk-koperasi-create')
                <a href="{{route('produk-koperasi.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                @endcan
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Poto</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Deskripsi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produkKoperasi as $key => $produk)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <img src="{{ \Storage::url($produk->poto_produk) }}" class="rounded" style="width: 150px">
                            </td>
                            <td>{{$produk->nama_produk}}</td>
                            <td>{{$produk->jenisProduk->jenis_produk}}</td>
                            <td>{{$produk->desk_produk}}</td>
                            <td>@can('produk-koperasi-edit')
                                <a href="{{route('produk-koperasi.edit', $produk)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                @endcan
                                @can('produk-koperasi-delete')
                                <a href="{{route('produk-koperasi.destroy', $produk)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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