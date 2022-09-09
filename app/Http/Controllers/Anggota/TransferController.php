<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\AnggotaTransaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:anggota-menu');
    }

    public function index()
    {
        return view('anggota.transfer.index');
    }

    public function manualTransfer()
    {
        return view('anggota.transfer.manual');
    }

    function fetch(Request $request)
    {
        $data = User::select("nama as value", "id", "no_anggota", "saldo")
            ->where('nama', 'LIKE', '%' . $request->get('search') . '%')
            ->get();

        return response()->json($data);
    }

    public function simpanManualTransfer(Request $request)
    {
        $request->validate([
            'nominal_transfer' => 'required|numeric',
            'nama_penerima' => 'required|string',
            'anggota_id' => 'required|numeric'
        ]);

        $nominalTransfer = $request->nominal_transfer;
        $namaPengirim = Auth::user()->nama;
        $penerimaID = $request->anggota_id;
        $sisaSaldoPengirim = Auth::user()->saldo - $nominalTransfer;
        $totalSaldoPenerima = $request->saldoPenerima + $nominalTransfer;

        if ($nominalTransfer < Auth::user()->saldo) {
            DB::transaction(
                function () use ($namaPengirim, $penerimaID, $sisaSaldoPengirim, $totalSaldoPenerima, $request) {

                    AnggotaTransaction::create([
                        'user_id' => Auth::user()->id,
                        'kredit' => $request->nominal_transfer,
                        'debit' => $sisaSaldoPengirim,
                        'tipe' => 'transfer',
                        'jenis' => 'keluar',
                        'tanggal' => Carbon::now(),
                        'metode' => 'manual',
                        'deskripsi' => 'Transfer ke ' . $request->nama_penerima
                    ]);

                    AnggotaTransaction::create([
                        'user_id' => $penerimaID,
                        'kredit' => $request->nominal_transfer,
                        'debit' => $totalSaldoPenerima,
                        'tipe' => 'transfer',
                        'jenis' => 'masuk',
                        'tanggal' => Carbon::now(),
                        'metode' => 'manual',
                        'deskripsi' => 'Transfer dari ' . $namaPengirim
                    ]);

                    User::where('id', $penerimaID)
                        ->update([
                            'saldo' => $totalSaldoPenerima
                        ]);

                    User::where('id', Auth::user()->id)
                        ->update([
                            'saldo' => $sisaSaldoPengirim
                        ]);
                }
            );
            return redirect()->route('anggota.transfer.index');
        }
        return redirect()->back()->with('error', 'Saldo g cukup');
    }

    public function scanTransfer()
    {
        return view('anggota.transfer.scantransfer');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $anggota = User::where('no_anggota', $cari)->get();

        // dd($anggota);
        if ($anggota) {
            return view('anggota.transfer.cari', ['anggota' => $anggota]);
        }
        return redirect()->route('home')
            ->with('error', 'Tidak menemukan data anggota');
    }

    public function kirimSaldo(Request $request)
    {
        $request->validate([
            'nominal_transfer' => 'required',
        ]);


        $anggotaPengirimID = Auth::user()->id;
        $namaPengirim = Auth::user()->nama;
        $nominal_transfer = $request->nominal_transfer;
        $sisaSaldoPengirim = Auth::user()->saldo - $nominal_transfer;

        $penerimaID = $request->penerimaID;
        $namaPenerima = $request->namaPenerima;
        $saldoPenerima = $request->saldoPenerima;
        $sisaSaldoPenerima = $saldoPenerima + $nominal_transfer;

        if ($nominal_transfer < Auth::user()->saldo) {


            DB::transaction(function () use ($anggotaPengirimID, $nominal_transfer, $sisaSaldoPengirim, $penerimaID, $sisaSaldoPenerima, $namaPengirim, $namaPenerima) {

                AnggotaTransaction::create([
                    'anggota_id' => $anggotaPengirimID,
                    'kredit' => $nominal_transfer,
                    'debit' => $sisaSaldoPengirim,
                    'type' => 'Transfer',
                    'jenis' => 'keluar',
                    'tanggal' => Carbon::now(),
                    'metode' => 'QrCode',
                    'deskripsi' => 'Transfer ke ' . $namaPenerima,
                ]);

                AnggotaTransaction::create([
                    'anggota_id' => $penerimaID,
                    'kredit' => $nominal_transfer,
                    'debit' => $sisaSaldoPenerima,
                    'type' => 'Transfer',
                    'jenis' => 'masuk',
                    'tanggal' => Carbon::now(),
                    'metode' => 'QrCode',
                    'deskripsi' => 'Transfer dari ' . $namaPengirim,
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
            return redirect()->route('anggota.transfer.index')
                ->with('success', 'Pengajuan pencairan simpanan sukarela sukses dikirim');
        } else {
            return redirect()->back()
                ->with('error', 'Saldo tidak mencukupi');
        }
    }
}
