@extends('adminlte::page')

@section('title', 'Tambah Gallery')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Gallery</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Judul Gallery</label>
                        <input type="text" class="form-control @error('judul_gallery') is-invalid @enderror" placeholder="Judul Gallery" name="judul_gallery" value="{{old('judul_gallery')}}">
                        @error('judul_gallery') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Caption</label>
                        <input type="text" class="form-control @error('caption_gallery') is-invalid @enderror" placeholder="Caption" name="caption_gallery" value="{{old('caption_gallery')}}">
                        @error('caption_gallery') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Foto Gallery:</label>
                        <input type="file" name="foto_gallery" class="form-control @error('foto_gallery') is-invalid @enderror">

                        @error('foto_gallery')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class=" card-footer">
                        <button type="submit" class="btn btn-primary">Cairkan</button>
                        <a href="{{route('gallery.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
            </div>
        </div>
    </div>
</div>
@stop