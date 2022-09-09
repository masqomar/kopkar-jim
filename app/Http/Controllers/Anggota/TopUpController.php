<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\AnggotaTopup;
use App\Models\AnggotaTransaction;
use App\Models\SimpananAnggota;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Telegram\Bot\Laravel\Facades\Telegram;

class TopUpController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:anggota-menu');
    }

    public function index()
    {
        return view('anggota.topup.index');
    }

    public function topUpCash()
    {
        return view('anggota.topup.cash');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nominal_topup' => 'required|numeric'
        ]);

        $anggota = Auth::user()->id;
        AnggotaTopup::create([
            'nominal_topup' => $request->nominal_topup,
            'user_id' => $anggota,
            'tgl_topup' => Carbon::now(),
            'keterangan' => 'Topup Cash'
        ]);

        return redirect()->route('anggota.topup.konfirmasi');
    }

    public function konfirmasi()
    {
        return view('anggota.topup.konfirmasi');
    }

    public function topUpSukarela()
    {
        $anggota = Auth::user()->id;
        $saldoSukarela = SimpananAnggota::where('user_id', $anggota)->where('produk_id', 1)->sum('jumlah');
        $topUpJimpay = AnggotaTopup::where('user_id', $anggota)->where('keterangan', 'Saldo Sukarela')->sum('nominal_topup');
        $totalTransaksiTarik = AnggotaTransaction::where('user_id', $anggota)->where('tipe', 'tarik')->sum('kredit');

        $sisaSimSukarela = $saldoSukarela - $topUpJimpay - $totalTransaksiTarik;

        // dd($sisaSimSukarela);
        return view('anggota.topup.sukarela', compact('sisaSimSukarela'));
    }

    public function storeSukarela(Request $request)
    {
        $request->validate([
            'nominal_topup' => 'required|numeric'
        ]);

        $nominalTopup = $request->nominal_topup;
        $namaAnggota = Auth::user()->nama;
        $noAnggota = Auth::user()->no_anggota;
        $anggota = Auth::user()->id;
        $saldoAkhir = Auth::user()->saldo + $nominalTopup;

        $saldoSukarela = SimpananAnggota::where('user_id', $anggota)->where('produk_id', 1)->sum('jumlah');
        $topUpJimpay = AnggotaTopup::where('user_id', $anggota)->where('keterangan', 'Saldo Sukarela')->sum('nominal_topup');
        $totalTransaksiTarik = AnggotaTransaction::where('user_id', $anggota)->where('tipe', 'tarik')->sum('kredit');

        $sisaSimSukarela = $saldoSukarela - $topUpJimpay - $totalTransaksiTarik;
        if ($nominalTopup < $sisaSimSukarela) {
            User::where('id', $anggota)
                ->update([
                    'saldo' => $saldoAkhir
                ]);
            AnggotaTopup::create([
                'nominal_topup' => $request->nominal_topup,
                'user_id' => $anggota,
                'tgl_topup' => Carbon::now(),
                'keterangan' => 'Saldo Sukarela'
            ]);

            $text = "<b>Topup JIMPay Baru</b>\n\n"
                . "<b>Metode: </b>"
                . "<b>Ambil Simpanan Sukarela</b>\n"
                . "<b>Nama: </b>"
                . "$namaAnggota\n"
                . "<b>No Anggota: </b>"
                . "$noAnggota\n"
                . "<b>Nominal TopUp: </b>"
                . "$nominalTopup\n"
                . "<b>Sisa Simpanan Sukarela: </b>"
                . "$sisaSimSukarela\n\n";

            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);

            return redirect()->route('anggota.topup.index');
        }
        return redirect()->back()->with('error', 'Simpanan g cukup');
    }
}
