<?php

namespace App\Http\Controllers;

use App\Models\AnggotaTransaction;
use App\Models\MitraTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->level;

        $anggota = Auth::user()->id;
        $riwayatTransaksiAnggota = AnggotaTransaction::where('user_id', $anggota)
            ->limit(2)
            ->orderBy('id', 'DESC')
            ->get();
        $riwayatTransaksiMitraAll = MitraTransaction::where('kantin_id', $anggota)
            ->limit(2)
            ->orderBy('id', 'DESC')
            ->get();

        if ($user === 'anggota') {
            return view('anggota.index', compact('riwayatTransaksiAnggota'));
        } else if ($user === 'user') {
            return view('user.index');
        } else if ($user === 'mitra') {
            return view('mitra.index', compact('riwayatTransaksiMitraAll'));
        }

        return view('home');
    }
}
