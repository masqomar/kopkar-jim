@extends('adminlte::page')

@section('title', 'List Permission')

@section('content_header')
<h1 class="m-0 text-dark">List Permission</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @can('permission-create')
                <a href="{{route('permissions.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                @endcan
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $key => $permission)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$permission->name}}</td>
                            <td>@can('permission-edit')
                                <a href="{{route('permissions.show', $permission->id)}}" class="btn btn-info btn-xs">
                                    Detail
                                </a>
                                <a href="{{route('permissions.edit', $permission)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                @endcan
                                @can('permission-delete')
                                <a href="{{route('permissions.destroy', $permission)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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