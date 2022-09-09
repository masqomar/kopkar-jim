<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KasKoperasi;
use App\Models\KodeAkun;
use Illuminate\Http\Request;

class KasKeluarController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:kas-keluar-list|kas-keluar-create|kas-keluar-edit|kas-keluar-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:kas-keluar-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:kas-keluar-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:kas-keluar-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $kasKeluar = KasKoperasi::where('jenis_kas', 'keluar')->get();

        return view('admin.kas-keluar.index', compact('kasKeluar'));
    }

    public function create()
    {
        $kodeAkun = KodeAkun::all();

        return view('admin.kas-keluar.create', compact('kodeAkun'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_keluar' => 'required|numeric',
            'akun_id' => 'required|numeric',
            'keterangan' => 'required|string|max:255',
            'tgl_transaksi' => 'required'
        ]);

        KasKoperasi::create([
            'jenis_kas' => 'Keluar',
            'jumlah_keluar' => $request->jumlah_keluar,
            'akun_id' => $request->akun_id,
            'keterangan' => $request->keterangan,
            'tgl_transaksi' => $request->tgl_transaksi,
        ]);

        return redirect()->route('kas-keluar.index')
            ->with('success_message', 'Berhasil menambah kas');
    }

    public function edit($id)
    {
        // $kasKeluar = KasKoperasi::find($id);
        // $kodeAkun = KodeAkun::all();

        // return view('admin.kas-keluar.edit', compact('kasKeluar', 'kodeAkun'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'jumlah_keluar' => 'required|numeric',
        //     'akun_id' => 'required|numeric',
        //     'keterangan' => 'required|string|max:255',
        //     'tgl_transaksi' => 'required'
        // ]);

        // $input = $request->all();
        // $kasKeluar = KasKoperasi::find($id);
        // $kasKeluar->update($input);

        // return redirect()->route('kas-keluar.index')
        //     ->with('success_message', 'Berhasil mengubah kas');
    }
}
