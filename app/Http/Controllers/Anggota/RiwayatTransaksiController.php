<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\AnggotaTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatTransaksiController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:anggota-menu');
    }

    public function index(Request $request)
    {
        $anggota = Auth::user()->id;
        $riwayatTransaksiAll = AnggotaTransaction::where('user_id', $anggota)
            ->orderBy('id', 'DESC')
            ->paginate(8);

        // dd($riwayatTransaksiAll);

        return view('anggota.riwayat-transaksi.index', compact('riwayatTransaksiAll'));
    }

    public function show($id)
    {
        $detailtransaksi = AnggotaTransaction::where('id', $id)->get();

        // dd($detailtransaksi);

        return view('anggota.riwayat-transaksi.show', compact('detailtransaksi'));
    }
}
