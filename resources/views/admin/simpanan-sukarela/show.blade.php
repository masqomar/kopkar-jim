@extends('adminlte::page')

@section('title', 'Detail Pencairan Simpanan Sukarela')

@section('content_header')
<h1 class="m-0 text-dark">Detail Pencairan Simpanan Sukarela</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table mb-0">
                    <tbody>
                        <tr>
                            <th scope="col">No Anggota</th>
                            <td>{{$detailPenarikan->user->no_anggota}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Nama Anggota</th>
                            <td>{{$detailPenarikan->user->nama}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Produk Simpanan</th>
                            <td>{{$detailPenarikan->produkKoperasi->nama_produk}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Nominal Penarikan</th>
                            <td>@rupiah($detailPenarikan->nominal_tarik)</td>
                        </tr>
                        <tr>
                            <th scope="col">Tanggal Penarikan</th>
                            <td>{{$detailPenarikan->tgl_tarik}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Keterangan</th>
                            <td>{{$detailPenarikan->keterangan}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Status</th>
                            <td>{{$detailPenarikan->status}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Bukti Transfer</th>
                            <td>
                                <img src="{{ \Storage::url($detailPenarikan->bukti_transfer) }}" class="rounded" style="width: 150px">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop