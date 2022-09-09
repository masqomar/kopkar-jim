<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisProduk;
use App\Models\ProdukKoperasi;
use Illuminate\Http\Request;

class ProdukKoperasiController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:produk-koperasi-list|produk-koperasi-create|produk-koperasi-edit|produk-koperasi-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:produk-koperasi-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:produk-koperasi-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:produk-koperasi-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $produkKoperasi = ProdukKoperasi::all();

        return view('admin.produk-koperasi.index', compact('produkKoperasi'));
    }

    public function create()
    {
        $jenisProduk = JenisProduk::all();

        return view('admin.produk-koperasi.create', compact('jenisProduk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string',
            'jenis_produk_id' => 'required|numeric',
            'poto_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desk_produk' => 'required|string|max:255'
        ]);

        $image = $request->file('poto_produk');
        $poto_produk = $image->storeAs('public/poto_produk', $image->hashName());

        ProdukKoperasi::create([
            'nama_produk' => $request->nama_produk,
            'jenis_produk_id' => $request->jenis_produk_id,
            'poto_produk' => $poto_produk,
            'desk_produk' => $request->desk_produk
        ]);

        return redirect()->route('produk-koperasi.index')
            ->with('success_message', 'Berhasil menambah produk baru');
    }

    public function edit($id)
    {
        $produkKoperasi = ProdukKoperasi::find($id);
        $jenisProduk = JenisProduk::all();
        return view('admin.produk-koperasi.edit', compact('produkKoperasi', 'jenisProduk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string',
            'jenis_produk_id' => 'required|numeric',
            'poto_produk' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desk_produk' => 'required|string|max:255'
        ]);

        $input = $request->all();
        $produkKoperasi = ProdukKoperasi::find($id);
        $produkKoperasi->update($input);

        return redirect()->route('produk-koperasi.index')
            ->with('success_message', 'Berhasil mengubah produk');
    }

    public function destroy(ProdukKoperasi $produkKoperasi)
    {
        $produkKoperasi->delete();

        return redirect()->route('produk-koperasi.index')
            ->with('success_message', 'Berhasil menghapus produk');
    }
}
