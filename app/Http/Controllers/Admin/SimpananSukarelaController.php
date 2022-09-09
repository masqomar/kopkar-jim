<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SimpananSukarelaExport;
use App\Http\Controllers\Controller;
use App\Imports\SimpananSukarelaImport;
use App\Models\AnggotaTopup;
use App\Models\AnggotaTransaction;
use App\Models\SimpananAnggota;
use App\Models\TransaksiSimpananAnggota;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SimpananSukarelaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:simpanan-sukarela-list|simpanan-sukarela-create|simpanan-sukarela-edit|simpanan-sukarela-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:simpanan-sukarela-create', ['only' => ['create', 'store', 'export', 'import', 'cairkanSimpanan', 'storePencairan']]);
        $this->middleware('permission:simpanan-sukarela-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:simpanan-sukarela-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $SimpananSukarelaAnggota = SimpananAnggota::where('produk_id', 1)->get();

        return view('admin.simpanan-sukarela.index', compact('SimpananSukarelaAnggota'));
    }

    public function show($id)
    {
        $detailPenarikan = TransaksiSimpananAnggota::find($id);

        // dd($detailPenarikan);
        return view('admin.simpanan-sukarela.show', compact('detailPenarikan'));
    }

    public function export()
    {
        return Excel::download(new SimpananSukarelaExport, 'simpanan_sukarela.xlsx');
    }

    public function import()
    {
        Excel::import(new SimpananSukarelaImport, request()->file('file'));

        return back();
    }

    public function cairkanSimpanan($id)
    {
        $transaksiSimpananAnggota = TransaksiSimpananAnggota::find($id);
        $detailID = $transaksiSimpananAnggota->user_id;

        $totalSimpananSukarela = SimpananAnggota::where('user_id', $detailID)->where('produk_id', 1)->sum('jumlah');
        $totalTopUpSukarela = AnggotaTopup::where('user_id', $detailID)->where('keterangan', 'Saldo Sukarela')->sum('nominal_topup');
        $totalTransaksiTarik = AnggotaTransaction::where('user_id', $detailID)->where('tipe', 'tarik')->sum('kredit');
        $sisaSaldoSukarela = $totalSimpananSukarela - $totalTopUpSukarela - $totalTransaksiTarik;

        // dd($totalTransaksiTarik);
        return view('admin.simpanan-sukarela.cairkan', compact('transaksiSimpananAnggota', 'totalSimpananSukarela', 'totalTopUpSukarela', 'totalTransaksiTarik', 'sisaSaldoSukarela'));
    }

    public function storePencairan(Request $request)
    {
        $request->validate([
            'status' => 'required|string',
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('bukti_transfer');
        $bukti_transfer = $image->storeAs('public/bukti_transfer', $image->hashName());

        $status = $request->status;
        $id = $request->transaksiID;

        TransaksiSimpananAnggota::where('id', $id)
            ->update([
                'status' => $status,
                'bukti_transfer' => $bukti_transfer
            ]);
        AnggotaTransaction::create([
            'user_id' => $request->user_id,
            'kredit'  => $request->nominal_tarik,
            'debit'  => 0,
            'tipe'  => 'tarik',
            'jenis'  => 'keluar',
            'tanggal'  => Carbon::now(),
            'metode'  => 'Penarikan dari teller',
            'deskripsi'  => 'Penarikan simpanan sukarela'
        ]);

        // dd($cek);
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil mencairkan simpanan anggota');
    }
}
