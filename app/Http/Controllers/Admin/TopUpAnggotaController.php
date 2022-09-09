<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnggotaTopup;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopUpAnggotaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:topup-list|topup-create|topup-edit|topup-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:topup-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:topup-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:topup-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $topupAnggota = AnggotaTopup::orderBy('tgl_topup', 'desc')->get();

        return view('admin.topup-anggota.index', compact('topupAnggota'));
    }

    public function create()
    {
        $anggotaAll = User::all();

        return view('admin.topup-anggota.create', compact('anggotaAll'));
    }

    public function store(Request $request)
    {
        DB::transaction(
            function () use ($request) {

                $user_id = $request->user_id;
                $nominal_topup = $request->nominal_topup;
                $keterangan = 'Voucher Bulanan Anggota';

                for ($i = 0; $i < count($user_id); $i++) {
                    AnggotaTopup::create([
                        'nominal_topup' => $nominal_topup[$i],
                        'user_id' => $user_id[$i],
                        'tgl_topup' => Carbon::now(),
                        'keterangan' => $keterangan,
                    ]);
                }
            }
        );
        return redirect()->route('topup-anggota.index')
            ->with('success_message', 'Berhasil menambah voucher bulanan anggota');
    }
}
