<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\SimpananAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimpananWajibController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:anggota-menu');
    }

    public function index()
    {
        $anggotaID = Auth::user()->id;
        $simpananWajib = SimpananAnggota::where('produk_id', 7)
            ->where('user_id', $anggotaID)
            ->sum('jumlah');

        // dd($simpananWajib);
        return view('anggota.sim-wajib.index', compact('simpananWajib', 'anggotaID'));
    }

    public function show($id)
    {
        $anggotaID = Auth::user()->id;
        $simpananWajib = SimpananAnggota::where('produk_id', 7)
            ->where('user_id', $anggotaID)
            ->get();

        $totalSimpananWajib = SimpananAnggota::where('produk_id', 7)
            ->where('user_id', $anggotaID)
            ->sum('jumlah');

        // dd($simpananWajib);
        return view('anggota.sim-wajib.show', compact('simpananWajib', 'anggotaID', 'totalSimpananWajib'));
    }
}
