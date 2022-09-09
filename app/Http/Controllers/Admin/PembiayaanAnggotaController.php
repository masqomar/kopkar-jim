<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanPembiayaan;
use Illuminate\Http\Request;

class PembiayaanAnggotaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:pembiayaan-list|pembiayaan-create|pembiayaan-edit|pembiayaan-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:pembiayaan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pembiayaan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pembiayaan-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $pengajuanAll = PengajuanPembiayaan::all();

        return view('admin.pembiayaan.index', compact('pengajuanAll'));
    }
}
