<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\AnggotaTopup;
use App\Models\AnggotaTransaction;
use App\Models\SimpananAnggota;
use App\Models\TransaksiSimpananAnggota;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimpananSukarelaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:anggota-menu');
    }

    public function index()
    {
        $anggotaID = Auth::user()->id;
        $totalSimpananSukarela = SimpananAnggota::where('produk_id', 1)->where('user_id', $anggotaID)->sum('jumlah');
        $totalTransaksiTarik = AnggotaTransaction::where('user_id', $anggotaID)->where('tipe', 'tarik')->sum('kredit');
        $totalTopUpSukarela = AnggotaTopup::where('user_id', $anggotaID)->where('keterangan', 'Saldo Sukarela')->sum('nominal_topup');

        $saldoSukarela = $totalSimpananSukarela - $totalTransaksiTarik - $totalTopUpSukarela;


        return view('anggota.sim-sukarela.index', compact('saldoSukarela', 'anggotaID'));
    }

    public function show($id)
    {
        $anggotaID = Auth::user()->id;
        $simpananSukarela = SimpananAnggota::where('produk_id', 1)->where('user_id', $anggotaID)->get();

        $totalSimpananSukarela = SimpananAnggota::where('produk_id', 1)->where('user_id', $anggotaID)->sum('jumlah');
        $totalTransaksiTarik = AnggotaTransaction::where('user_id', $anggotaID)->where('tipe', 'tarik')->sum('kredit');
        $totalTopUpSukarela = AnggotaTopup::where('user_id', $anggotaID)->where('keterangan', 'Saldo Sukarela')->sum('nominal_topup');

        $saldoSukarela = $totalSimpananSukarela - $totalTransaksiTarik - $totalTopUpSukarela;

        // dd($detailPenarikanDana);
        return view('anggota.sim-sukarela.show', compact('simpananSukarela', 'anggotaID', 'totalSimpananSukarela', 'totalTransaksiTarik', 'totalTopUpSukarela', 'saldoSukarela'));
    }

    public function tarik()
    {
        $anggotaID = Auth::user()->id;
        $totalSimpananSukarela = SimpananAnggota::where('produk_id', 1)->where('user_id', $anggotaID)->sum('jumlah');
        $totalTransaksiTarik = AnggotaTransaction::where('user_id', $anggotaID)->where('tipe', 'tarik')->sum('kredit');
        $totalTopUpSukarela = AnggotaTopup::where('user_id', $anggotaID)->where('keterangan', 'Saldo Sukarela')->sum('nominal_topup');

        $saldoSukarela = $totalSimpananSukarela - $totalTransaksiTarik - $totalTopUpSukarela;

        return view('anggota.sim-sukarela.tarik', compact('saldoSukarela'));
    }

    public function tarikStore(Request $request)
    {
        $request->validate([
            'nominal_tarik' => 'required|numeric'
        ]);

        TransaksiSimpananAnggota::create([
            'nominal_tarik' => $request->nominal_tarik,
            'keterangan' => $request->keterangan,
            'tgl_tarik' => Carbon::now(),
            'user_id' => Auth::user()->id,
            'produk_id' => 1,
            'status' => 'Diproses'
        ]);

        return redirect()->route('anggota.sim-sukarela.index')
            ->with('success', 'Pengajuan pencairan terkirim');
    }

    public function detailPenarikan()
    {
        $anggotaID = Auth::user()->id;
        $detailPenarikanSukarela = TransaksiSimpananAnggota::where('user_id', $anggotaID)->where('produk_id', 1)->get();
        $totakPenarikanSukarela = TransaksiSimpananAnggota::where('user_id', $anggotaID)
            ->where('produk_id', 1)
            ->where('status', 'Sukses')
            ->sum('nominal_tarik');

        return view('anggota.sim-sukarela.detailpenarikan', compact('anggotaID', 'detailPenarikanSukarela', 'totakPenarikanSukarela'));
    }
}
