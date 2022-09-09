@extends('layouts.user')

@section ('title')
Data Permission
@endsection


@section ('content')
<div class="container">
    <div class="element-heading mt-3">
        <h6>
            <font color="#F4A460"> <strong>Data Permission<strong></font>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <a class="btn btn-sm btn-warning" href="{{route('permissions.create')}}" permission="button">Tambah</a>
        </h6>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Permission</th>
                        <th class="text-center" width="170px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $key => $permission)
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{ route('permissions.show',$permission->id) }}">Show</a>
                            @can('permission-edit')
                            <a class="btn btn-sm btn-primary" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
                            @endcan
                            @can('permission-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                            {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection