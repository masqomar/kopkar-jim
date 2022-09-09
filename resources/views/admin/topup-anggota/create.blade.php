@extends('adminlte::page')

@section('title', 'Top Up Bulanan')

@section('content_header')
<h1 class="m-0 text-dark">Top Up Bulanan</h1>
@stop

@section('content')
<form action="{{route('topup-anggota.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row" style="background-color: lightgoldenrodyellow">
                        <div class="alert alert-warning">
                            <div class="media">
                                <h6 class="mb-0 font-weight-normal">
                                    Untuk mengurangi resiko topup, HARAP di input per 10 anggota saja!
                                </h6>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <th>Nama Anggota</th>
                                <th>Nominal Topup</th>
                                <th style="text-align: center" onclick="addRow()">
                                    <a href="#" class="btn btn-success">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control" name="user_id[]">
                                            <option value="" selected disabled>Pilih Anggota</option>
                                            @foreach($anggotaAll as $anggota)
                                            <option value="{{$anggota->id}}">{{$anggota->nama}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="number" name="nominal_topup[]" value="10000" class="form-control"></td>
                                    <td style="text-align: center" onclick="cannotdelete()">
                                        <a href="#" class="btn btn-danger remove">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <br>

                        <button type="submit" class="btn btn-primary pull-right">Submit</button>

                    </div>
                </div>
            </div>
        </div>
        @stop

        @push('js')
        <script>
            function addRow() {
                var tr = '<tr>' +
                    '<td>' +
                    '<select class="form-control" name="user_id[]">' +
                    '<option value="" selected disabled>Pilih Anggota</option>' +
                    '@foreach($anggotaAll as $anggota)' +
                    '<option value="{{$anggota->id}}">{{$anggota->nama}}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</td>' +
                    '<td><input type="number" name="nominal_topup[]" value="10000" class="form-control"></td>' +
                    '<td class="remove" style="text-align: center"><a href="#" class="btn btn-danger" onclick="deleteRow()"><i class="fa fa-times"></i></a></td>' +
                    '</tr>';

                $('tbody').append(tr);
            }

            function deleteRow() {
                $(document).on('click', '.remove', function() {
                    $(this).parent('tr').remove();
                });
            }

            function cannotdelete() {
                alert('You cannot delete the first row!!!')
            }
        </script>
        @endpush