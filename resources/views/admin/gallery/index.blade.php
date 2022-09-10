@extends('adminlte::page')

@section('title', 'Data Gallery')

@section('content_header')
<h1 class="m-0 text-dark">Data Gallery</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                @can('gallery-create')
                <a href="{{route('gallery.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                @endcan
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Caption</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gallery as $key => $galery)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <img src="{{ asset('/images/'.$galery->foto_gallery) }}" alt="JIM gallery" class="rounded" style="width: 150px">
                            </td>
                            <td>{{$galery->judul_gallery}}</td>
                            <td>{{$galery->caption_gallery}}</td>
                            <td>@can('gallery-edit')
                                <a href="{{route('gallery.edit', $galery)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                @endcan
                                @can('gallery-delete')
                                <a href="{{route('gallery.destroy', $galery)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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