<?php

namespace App\Http\Controllers;

use App\Models\AnggotaTopup;
use App\Models\AnggotaTransaction;
use App\Models\SimpananAnggota;
use App\Models\TransaksiSimpananAnggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store', 'show']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);
        $array = $request->only([
            'name', 'email', 'password'
        ]);
        $array['password'] = bcrypt($array['password']);
        User::create($array);
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil menambah user baru');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        if (!$user) return redirect()->route('users.index')
            ->with('error_message', 'User dengan id' . $id . ' tidak ditemukan');
        return view('users.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRole' => $userRole
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil mengubah user');
    }

    public function show($id)
    {
        $user = User::find($id);
        $simpananWajib = SimpananAnggota::where('user_id', $id)->where('produk_id', 7)->orderBy('id', 'DESC')->get();
        $simpananSukarela = SimpananAnggota::where('user_id', $id)->where('produk_id', 1)->orderBy('id', 'DESC')->get();
        $transaksiAnggota = AnggotaTransaction::where('user_id', $id)->orderBy('id', 'DESC')->get();
        $topupAnggota = AnggotaTopup::where('user_id', $id)->orderBy('id', 'DESC')->get();
        $transaksiTarik = AnggotaTransaction::where('user_id', $id)->where('tipe', 'tarik')->orderBy('id', 'DESC')->get();
        $prosesTarikDana = TransaksiSimpananAnggota::where('user_id', $id)->orderBy('id', 'DESC')->get();

        $totalSimpananWajib = SimpananAnggota::where('user_id', $id)->where('produk_id', 7)->sum('jumlah');
        $totalSimpananSukarela = SimpananAnggota::where('user_id', $id)->where('produk_id', 1)->sum('jumlah');
        $totalTopUpAnggota = AnggotaTopup::where('user_id', $id)->sum('nominal_topup');
        $totalTopUpSukarela = AnggotaTopup::where('user_id', $id)->where('keterangan', 'Saldo Sukarela')->sum('nominal_topup');
        $totalTransaksiPembelian = AnggotaTransaction::where('user_id', $id)->where('tipe', 'pembelian')->sum('kredit');
        $totalTransaksiDonasi = AnggotaTransaction::where('user_id', $id)->where('tipe', 'donasi')->sum('kredit');
        $totalTransaksiTransfer = AnggotaTransaction::where('user_id', $id)->where('tipe', 'transfer')->sum('kredit');
        $totalTransaksiTarik = AnggotaTransaction::where('user_id', $id)->where('tipe', 'tarik')->sum('kredit');
        $prosesTarikSimpanan = TransaksiSimpananAnggota::where('user_id', $id)->where('status', 'Diproses')->sum('nominal_tarik');

        // dd($prosesTarikDana);
        return view('users.show', compact('user', 'simpananSukarela', 'simpananWajib', 'transaksiAnggota', 'topupAnggota', 'transaksiTarik', 'totalSimpananWajib', 'totalSimpananSukarela', 'totalTopUpAnggota', 'totalTopUpSukarela', 'totalTransaksiPembelian', 'totalTransaksiDonasi', 'totalTransaksiTransfer', 'totalTransaksiTarik', 'prosesTarikSimpanan', 'prosesTarikDana'));
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if ($id == $request->user()->id) return redirect()->route('users.index')
            ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($user) $user->delete();
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil menghapus user');
    }
}
