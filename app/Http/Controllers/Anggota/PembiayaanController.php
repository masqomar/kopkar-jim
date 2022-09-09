<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\PembiayaanAnggota;
use App\Models\PengajuanPembiayaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembiayaanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:anggota-menu');
    }

    public function index()
    {
        $anggotaID = Auth::user()->id;
        $pengajuanAll = PengajuanPembiayaan::where('user_id', $anggotaID)->get();

        return view('anggota.pembiayaan.index', compact('anggotaID', 'pengajuanAll'));
    }

    public function create()
    {
        $q = DB::table('pembiayaan_ajukan')->select(DB::raw('MAX(RIGHT(kode_pembiayaan, 3))as kode'));
        $kodeOtomatis = "";
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kodeOtomatis = 'Pemb-' . sprintf('%03s', $tmp);
            }
        } else {
            $kodeOtomatis = 'Pemb-001';
        }

        return view('anggota.pembiayaan.create', compact('kodeOtomatis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_pembiayaan' => 'required|string',
            'nama_barang' => 'required|string',
        ]);

        PengajuanPembiayaan::create([
            'kode_pembiayaan' => $request->kode_pembiayaan,
            'user_id' => Auth::user()->id,
            'produk_id' => 9,
            'nama_barang' => $request->nama_barang,
            'spek_barang' => $request->spek_barang,
            'catatan' => $request->catatan,
            'tanggal_pengajuan' => Carbon::now(),
            'status_pengajuan' => 'Diproses'
        ]);

        return redirect()->route('home')
            ->with('success');
    }
}
