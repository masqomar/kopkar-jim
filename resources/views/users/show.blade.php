@extends('adminlte::page')

@section('title', 'Detail User')

@section('content_header')
<h1 class="m-0 text-dark">Detail User</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-4">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{asset('theme')}}/avatar1.png" style="object-fit:cover; width:150px; height:150px;" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{$user->nama}}</h3>
                <p class="text-muted text-center"><strong>No Anggota: {{$user->no_anggota}}</strong></p>
                <div class="card-body">
                    <strong><i class="fas fa-fw fa-user"></i>Jenis Kelamin</strong>
                    <p class="text-muted">{{$user->kelamin}}</p>
                    <strong><i class="fas fa-star mr-1"></i>Saldo</strong>
                    <p class="text-muted">@rupiah($user->saldo)</p>
                    <strong><i class="fas fa-envelope mr-2"></i>No. Telp/HP</strong>
                    <p class="text-muted">{{$user->telepon}}</p>
                    <strong><i class="fas fa-clock"></i>Tanggal Bergabung</strong>
                    <p class="text-muted">{{$user->tanggal_pendaftaran}}</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-8">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <h3>@rupiah($totalSimpananWajib)</h3>
                        <p>Total Simpanan Wajib</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="#setoran" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-indigo">
                    <div class="inner">
                        <h3>@rupiah($totalSimpananSukarela)</h3>
                        <p>Total Simpanan Sukarela</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#setoran" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-lightblue">
                    <div class="inner">
                        <h3>@rupiah($totalTopUpAnggota)</h3>
                        <p>Total TopUp Anggota</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#setoran" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>@rupiah($totalTopUpSukarela)</h3>
                        <p>Total TopUp Sukarela</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#setoran" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h3>@rupiah($totalTransaksiPembelian)</h3>
                        <p>Total Transaksi Pembelian</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#setoran" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-olive">
                    <div class="inner">
                        <h3>@rupiah($totalTransaksiDonasi)</h3>
                        <p>Total Donasi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#setoran" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>@rupiah($totalTransaksiTransfer)</h3>
                        <p>Total Transaksi Transfer</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#setoran" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>@rupiah($totalTransaksiTarik)</h3>
                        <p>Total Transaksi Tarik</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#setoran" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>@rupiah($prosesTarikSimpanan)</h3>
                        <p>SEGERA DIPROSES YA BOS...</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="linkto" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-simpanan-wajib" data-toggle="pill" href="#isi-tab-simpanan-wajib" role="tab" aria-controls="isi-tab-simpanan-wajib" aria-selected="true">Simpanan Wajib</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-simpanan-sukarela" data-toggle="pill" href="#isi-tab-simpanan-sukarela" role="tab" aria-controls="isi-tab-simpanan-sukarela" aria-selected="false">Simpanan Sukarela</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-proses-penarikan" data-toggle="pill" href="#isi-tab-proses-penarikan" role="tab" aria-controls="isi-tab-proses-penarikan" aria-selected="false">Proses Penarikan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-penarikan-sukarela" data-toggle="pill" href="#isi-tab-penarikan-sukarela" role="tab" aria-controls="isi-tab-penarikan-sukarela" aria-selected="false">Riwayat Penarikan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-topup-jimpay" data-toggle="pill" href="#isi-tab-topup-jimpay" role="tab" aria-controls="isi-tab-topup-jimpay" aria-selected="false">TopUp JIMPay</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-transaksi" data-toggle="pill" href="#isi-tab-transaksi" role="tab" aria-controls="isi-tab-transaksi" aria-selected="false">Transaksi</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="isi-tab-simpanan-wajib" role="tabpanel" aria-labelledby="tab-simpanan-wajib">
                        <table class="table table-hover table-bordered table-stripped" id="sim-wajib-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Simpanan</th>
                                    <th>Jumlah</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Tanggal Setor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($simpananWajib as $key => $simWajib)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$simWajib->produkKoperasi->nama_produk}}</td>
                                    <td>@rupiah($simWajib->jumlah)</td>
                                    <td>{{$simWajib->periode_bulan}}</td>
                                    <td>{{$simWajib->periode_tahun}}</td>
                                    <td>{{$simWajib->tanggal_setor}}</td>
                                </tr>
                                @empty
                                <tr>
                            <tbody>
                                <td colspan="6">Belum ada data</td>
                            </tbody>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="isi-tab-simpanan-sukarela" role="tabpanel" aria-labelledby="tab-simpanan-sukarela">
                        <table class="table table-hover table-bordered table-stripped" id="transaksi-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Simpanan</th>
                                    <th>Jumlah</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Tanggal Setor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($simpananSukarela as $key => $simSukarela)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$simSukarela->produkKoperasi->nama_produk}}</td>
                                    <td>@rupiah($simSukarela->jumlah)</td>
                                    <td>{{$simSukarela->periode_bulan}}</td>
                                    <td>{{$simSukarela->periode_tahun}}</td>
                                    <td>{{$simSukarela->tanggal_setor}}</td>
                                </tr>
                                @empty
                                <tr>
                            <tbody>
                                <td colspan="6">Belum ada data</td>
                            </tbody>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="isi-tab-proses-penarikan" role="tabpanel" aria-labelledby="tab-proses-penarikan">
                        <table class="table table-hover table-bordered table-stripped" id="proses-penarikan-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($prosesTarikDana as $key => $tarikDana)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$tarikDana->tgl_tarik}}</td>
                                    <td>@rupiah($tarikDana->nominal_tarik)</td>
                                    <td>{{$tarikDana->keterangan}}</td>
                                    <td>
                                        <label class="badge {{ ($tarikDana->status == 'Sukses') ? 'bg-primary' : 'bg-warning' }}"> {{$tarikDana->status}}</label>
                                    </td>
                                    <td>@can('simpanan-sukarela-create')
                                        @if ($tarikDana->status === 'Diproses')
                                        <a href="{{route('admin.simpanan-sukarela.cairkan', $tarikDana->id)}}" class="btn btn-success btn-xs">
                                            Proses
                                        </a>
                                        @endif
                                        @if ($tarikDana->status === 'Sukses')
                                        <a href="{{route('admin.simpanan-sukarela.show', $tarikDana->id)}}" class="btn btn-info btn-xs">
                                            Detail
                                        </a>
                                        @endif
                                        @endcan
                                    </td>
                                </tr>
                                @empty
                                <tr>
                            <tbody>
                                <td colspan="6">Belum ada data</td>
                            </tbody>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="isi-tab-penarikan-sukarela" role="tabpanel" aria-labelledby="tab-penarikan-sukarela">
                        <table class="table table-hover table-bordered table-stripped" id="penarikan-sukarela-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tipe</th>
                                    <th>Jenis</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                    <th>Metode</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transaksiTarik as $key => $tarik)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$tarik->tipe}}</td>
                                    <td>{{$tarik->jenis}}</td>
                                    <td>{{$tarik->tanggal}}</td>
                                    <td>@rupiah($tarik->kredit)</td>
                                    <td>{{$tarik->metode}}</td>
                                    <td>{{$tarik->deskripsi}}</td>
                                </tr>
                                @empty
                                <tr>
                            <tbody>
                                <td colspan="6">Belum ada data</td>
                            </tbody>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="isi-tab-topup-jimpay" role="tabpanel" aria-labelledby="tab-topup-jimpay">
                        <table class="table table-hover table-bordered table-stripped" id="topup-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Top Up</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($topupAnggota as $key => $topup)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$topup->tgl_topup}}</td>
                                    <td>@rupiah($topup->nominal_topup)</td>
                                    <td>{{$topup->keterangan}}</td>
                                </tr>
                                @empty
                                <tr>
                            <tbody>
                                <td colspan="6">Belum ada data</td>
                            </tbody>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="isi-tab-transaksi" role="tabpanel" aria-labelledby="tab-transaksi">
                        <table class="table table-hover table-bordered table-stripped" id="sim-sukarela-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tipe</th>
                                    <th>Jenis</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                    <th>Metode</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transaksiAnggota as $key => $transaksi)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$transaksi->tipe}}</td>
                                    <td>
                                        <label class="badge {{ ($transaksi->jenis == 'masuk') ? 'bg-success' : 'bg-danger' }}"> {{$transaksi->jenis}}</label>
                                    </td>
                                    <td>{{$transaksi->tanggal}}</td>
                                    <td>@rupiah($transaksi->kredit)</td>
                                    <td>{{$transaksi->metode}}</td>
                                    <td>{{$transaksi->deskripsi}}</td>
                                </tr>
                                @empty
                                <tr>
                            <tbody>
                                <td colspan="6">Belum ada data</td>
                            </tbody>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@stop
@push('js')
<script>
    $('#sim-wajib-table').DataTable({
        "responsive": true,
    });

    $('#sim-sukarela-table').DataTable({
        "responsive": true,
    });

    $('#proses-penarikan-table').DataTable({
        "responsive": true,
    });

    $('#penarikan-sukarela-table').DataTable({
        "responsive": true,
    });
</script>
@endpush