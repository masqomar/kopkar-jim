<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SimpananWajibExport;
use App\Http\Controllers\Controller;
use App\Imports\SimpananWajibImport;
use App\Models\SimpananAnggota;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SimpananWajibController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:simpanan-wajib-list|simpanan-wajib-create|simpanan-wajib-edit|simpanan-wajib-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:simpanan-wajib-create', ['only' => ['create', 'store', 'export', 'import']]);
        $this->middleware('permission:simpanan-wajib-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:simpanan-wajib-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $SimpananWajibAnggota = SimpananAnggota::where('produk_id', 7)->get();

        return view('admin.simpanan-wajib.index', compact('SimpananWajibAnggota'));
    }

    public function export()
    {
        return Excel::download(new SimpananWajibExport, 'simpanan_wajib.xlsx');
    }

    public function import()
    {
        Excel::import(new SimpananWajibImport, request()->file('file'));

        return back();
    }
}
