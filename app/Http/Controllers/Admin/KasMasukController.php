<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KasKoperasi;
use App\Models\KodeAkun;
use Illuminate\Http\Request;

class KasMasukController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:kas-masuk-list|kas-masuk-create|kas-masuk-edit|kas-masuk-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:kas-masuk-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:kas-masuk-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:kas-masuk-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $kasMasuk = KasKoperasi::where('jenis_kas', 'masuk')->get();

        return view('admin.kas-masuk.index', compact('kasMasuk'));
    }

    public function create()
    {
        $kodeAkun = KodeAkun::all();

        return view('admin.kas-masuk.create', compact('kodeAkun'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_masuk' => 'required|numeric',
            'akun_id' => 'required|numeric',
            'keterangan' => 'required|string|max:255',
            'tgl_transaksi' => 'required'
        ]);

        KasKoperasi::create([
            'jenis_kas' => 'Masuk',
            'jumlah_masuk' => $request->jumlah_masuk,
            'akun_id' => $request->akun_id,
            'keterangan' => $request->keterangan,
            'tgl_transaksi' => $request->tgl_transaksi,
        ]);

        return redirect()->route('kas-masuk.index')
            ->with('success_message', 'Berhasil menambah kas');
    }

    public function edit($id)
    {
        $kasMasuk = KasKoperasi::find($id);
        $kodeAkun = KodeAkun::all();

        return view('admin.kas-masuk.edit', compact('kasMasuk', 'kodeAkun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_masuk' => 'required|numeric',
            'akun_id' => 'required|numeric',
            'keterangan' => 'required|string|max:255',
            'tgl_transaksi' => 'required'
        ]);

        $input = $request->all();
        $kasMasuk = KasKoperasi::find($id);
        $kasMasuk->update($input);

        return redirect()->route('kas-masuk.index')
            ->with('success_message', 'Berhasil mengubah kas');
    }
}
