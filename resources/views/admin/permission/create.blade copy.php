@extends('layouts.user')

@section ('title')
Permission Baru
@endsection

@section ('content')

<div class="container">
    <div class="element-heading mt-3">
        <h6 class="text-center">
            <label class="text-info">Permission Baru</label>
        </h6>
    </div>


    <div class="card">
        <div class="card-body">
            <h6>Silahkan isi sesuai kebutuhan!</h6>
            <form action="{{ route('permissions.store') }}" method="POST">
                @csrf

                <div class="input-group mb-3">
                    <input class="form-control" type="text" name="permission" placeholder="Permission Baru" required>
                </div>

        </div>
    </div>
    <br>
    <div class="text-center">
        <button class="btn btn-sm btn-primary" type="submit">Tambah
        </button>
        <a class="btn btn-sm btn-warning" href="{{route('home')}}" role="button">Batal</a>
    </div>
</div>
@endsection