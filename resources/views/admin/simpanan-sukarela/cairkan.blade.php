@extends('adminlte::page')

@section('title', 'Cairkan Simpanan Sukarela')

@section('content_header')
<h1 class="m-0 text-dark">Cairkan Simpanan Sukarela</h1>
@stop

@section('content')
<form action="{{route('admin.simpanan-sukarela.storePencairan')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($transaksiSimpananAnggota->status === 'Diproses')
                    <input type="hidden" name="transaksiID" value="{{$transaksiSimpananAnggota->id}}">
                    <input type="hidden" name="user_id" value="{{$transaksiSimpananAnggota->user_id}}">
                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <input type="text" class="form-control @error('nama_anggota') is-invalid @enderror" id="exampleInputName" placeholder="Nama anggota" name="nama_anggota" value="{{$transaksiSimpananAnggota->user->nama ?? old('nama_anggota')}}" readonly>
                        @error('nama_anggota') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>No Anggota</label>
                        <input type="text" class="form-control @error('no_anggota') is-invalid @enderror" id="exampleInputName" placeholder="No anggota" name="no_anggota" value="{{$transaksiSimpananAnggota->user->no_anggota ?? old('no_anggota')}}" readonly>
                        @error('no_anggota') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Simpanan</label>
                        <input type="text" class="form-control @error('produk_id') is-invalid @enderror" placeholder="Nama simpanan" name="produk_id" value="{{$transaksiSimpananAnggota->produkKoperasi->nama_produk ?? old('produk_id')}}" readonly>
                        @error('produk_id') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" class="form-control @error('nominal_tarik') is-invalid @enderror" placeholder="Nominal" name="nominal_tarik" value="{{$transaksiSimpananAnggota->nominal_tarik ?? old('nominal_tarik')}}" readonly>
                        @error('nominal_tarik') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="bg-primary" scope="col">Total Simpanan Sukarela</th>
                                <td class="bg-primary">@rupiah($totalSimpananSukarela)</td>
                            </tr>
                            <tr>
                                <th class="bg-warning" scope="col">Total TopUp JIMPay</th>
                                <td class="bg-warning">@rupiah($totalTopUpSukarela)</td>
                            </tr>
                            <tr>
                                <th class="bg-indigo" scope="col">Total Penarikan Sukarela</th>
                                <td class="bg-indigo">@rupiah($totalTransaksiTarik)</td>
                            </tr>
                            <tr>
                                <th class="bg-danger" scope="col">Sisa Saldo Sukarela yang bisa DICAIRKAN</th>
                                <td class="bg-danger">@rupiah($sisaSaldoSukarela)</td>
                            </tr>
                            <td>
                                <h6 class="bg-orange"><strong>*Silahkan hubungi no {{$transaksiSimpananAnggota->user->telepon}} untuk konfirmasi nominal dan rekening</strong></h6>
                            </td>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <label>Tanggal Pengajuan</label>
                        <input type="text" class="form-control @error('tgl_tarik') is-invalid @enderror" placeholder="tanggal Pengajuan" name="tgl_tarik" value="{{$transaksiSimpananAnggota->tgl_tarik ?? old('tgl_tarik')}}" readonly>
                        @error('tgl_tarik') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan" name="keterangan" value="{{$transaksiSimpananAnggota->keterangan ?? old('keterangan')}}" readonly>
                        @error('keterangan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="">{{$transaksiSimpananAnggota->status}}</option>
                            <option value="Sukses">Sudah Di Cairkan</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Bukti Transfer:</label>
                        <input type="file" name="bukti_transfer" class="form-control @error('bukti_transfer') is-invalid @enderror">

                        @error('bukti_transfer')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class=" card-footer">
                        <button type="submit" class="btn btn-primary">Cairkan</button>
                        <a href="{{route('users.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if ($transaksiSimpananAnggota->status === 'Sukses')
        <div class="text-center bg-danger">
            <h3>
                Sudah diproses ya BOS...!
            </h3>
        </div>
        @endif
        @stop