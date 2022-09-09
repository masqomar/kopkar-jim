<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\TransaksiSimpananAnggota;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarikSaldoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:mitra-menu');
    }

    public function index()
    {
        return view('mitra.tarik.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nominal_tarik' => 'required|numeric',
        ]);

        TransaksiSimpananAnggota::create([
            'nominal_tarik' => $request->nominal_tarik,
            'user_id' => Auth::user()->id,
            'produk_id' => '12',
            'tgl_tarik' => Carbon::now(),
            'keterangan' => 'Penarikan dana saldo mitra' . Auth::user()->name,
            'status' => 'Diproses'
        ]);

        return redirect()->route('home')
            ->with('success', 'Pengajuan pencairan sudah terkirim');
    }
}
