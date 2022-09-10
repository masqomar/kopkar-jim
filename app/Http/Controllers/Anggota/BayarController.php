<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\AnggotaTransaction;
use App\Models\MitraTransaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BayarController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:anggota-menu');
    }

    public function index()
    {
        return view('anggota.bayar.index');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $merchant = User::where('no_anggota', $cari)->get();

        // dd($merchant);
        if ($merchant) {
            return view('anggota.bayar.cari', ['anggota' => $merchant]);
        } else {
            return redirect()->route('home')
                ->with('error', 'Tidak menemukan data merchant');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nominal_bayar' => 'required',
        ]);


        $anggotaPengirimID = Auth::user()->id;
        $namaPengirim = Auth::user()->nama;
        $nominal_bayar = $request->nominal_bayar;
        $sisaSaldoPengirim = Auth::user()->saldo - $nominal_bayar;

        $penerimaID = $request->penerimaID;
        $namaPenerima = $request->namaPenerima;
        $saldoPenerima = $request->saldoPenerima;
        $sisaSaldoPenerima = $saldoPenerima + $nominal_bayar;

        if ($nominal_bayar < Auth::user()->saldo) {
            DB::transaction(function () use ($anggotaPengirimID, $nominal_bayar, $sisaSaldoPengirim, $penerimaID, $sisaSaldoPenerima, $namaPengirim, $namaPenerima) {

                AnggotaTransaction::create([
                    'user_id' => $anggotaPengirimID,
                    'kredit' => $nominal_bayar,
                    'debit' => 0,
                    'tipe' => 'Pembelian',
                    'jenis' => 'keluar',
                    'tanggal' => Carbon::now(),
                    'metode' => 'QrCode',
                    'deskripsi' => 'Pembelian ke ' . $namaPenerima,
                ]);

                MitraTransaction::create([
                    'kantin_id' => $penerimaID,
                    'user_id' => $anggotaPengirimID,
                    'kredit' => 0,
                    'debit' => $nominal_bayar,
                    'tipe' => 'Pembelian',
                    'jenis' => 'masuk',
                    'tanggal' => Carbon::now(),
                    'metode' => 'QrCode',
                    'deskripsi' => 'Pembelian dari ' . $namaPengirim,
                ]);

                User::where('id', $anggotaPengirimID)
                    ->update([
                        'saldo' => $sisaSaldoPengirim
                    ]);

                User::where('id', $penerimaID)
                    ->update([
                        'saldo' => $sisaSaldoPenerima
                    ]);
            });
            return redirect()->route('anggota.bayar.sukses')
                ->with('success', 'Pembayaran Sukses');
        } else {
            return redirect()->back()
                ->with('error', 'Saldo tidak mencukupi');
        }
    }

    public function sukses()
    {
        return view('anggota.bayar.sukses');
    }
}
