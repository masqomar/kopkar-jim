<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KodeAkun;
use Illuminate\Http\Request;

class KodeAkunController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:kode-akun-list|kode-akun-create|kode-akun-edit|kode-akun-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:kode-akun-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:kode-akun-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:kode-akun-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $kodeAkun = KodeAkun::all();

        return view('admin.kode-akun.index', compact('kodeAkun'));
    }

    public function create()
    {
        return view('admin.kode-akun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_akun' => 'required|string',
            'nama_akun' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255'
        ]);

        KodeAkun::create([
            'kode_akun' => $request->kode_akun,
            'nama_akun' => $request->nama_akun,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kode-akun.index')
            ->with('success_message', 'Berhasil menambah kode akun baru');
    }

    public function edit($id)
    {
        $kodeAkun = KodeAkun::find($id);

        return view('admin.kode-akun.edit', compact('kodeAkun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_akun' => 'required|string',
            'nama_akun' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255'
        ]);

        $input = $request->all();
        $kodeAkun = KodeAkun::find($id);
        $kodeAkun->update($input);

        return redirect()->route('kode-akun.index')
            ->with('success_message', 'Berhasil mengubah kode akun');
    }

    public function destroy(KodeAkun $kodeAkun)
    {
        $kodeAkun->delete();

        return redirect()->route('kode-akun.index')
            ->with('success_message', 'Berhasil menghapus kode akun');
    }
}
