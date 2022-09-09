<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisProduk;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class JenisProdukController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:jenis-produk-list|jenis-produk-create|jenis-produk-edit|jenis-produk-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:jenis-produk-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:jenis-produk-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:jenis-produk-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $jenisProduk = JenisProduk::all();

        return view('admin.jenis-produk.index', compact('jenisProduk'));
    }

    public function create()
    {
        return view('admin.jenis-produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_produk' => 'required|string',
            'desk_jenis' => 'required|string|max:255'
        ]);

        JenisProduk::create([
            'jenis_produk' => $request->jenis_produk,
            'desk_jenis' => $request->desk_jenis,
        ]);

        return redirect()->route('jenis-produk.index')
            ->with('success_message', 'Berhasil menambah jenis produk baru');
    }

    public function edit($id)
    {
        $jenisProduk = JenisProduk::find($id);

        return view('admin.jenis-produk.edit', compact('jenisProduk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_produk' => 'required|string',
            'desk_jenis' => 'required|string|max:255'
        ]);

        $input = $request->all();
        $jenisProduk = JenisProduk::find($id);
        $jenisProduk->update($input);

        return redirect()->route('jenis-produk.index')
            ->with('success_message', 'Berhasil mengubah jenis produk');
    }

    public function destroy(JenisProduk $jenisProduk)
    {
        $jenisProduk->delete();

        return redirect()->route('jenis-produk.index')
            ->with('success_message', 'Berhasil menghapus jenis produk');
    }
}
