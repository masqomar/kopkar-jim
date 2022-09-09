<?php

use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\JenisProdukController;
use App\Http\Controllers\Admin\KasKeluarController;
use App\Http\Controllers\Admin\KasMasukController;
use App\Http\Controllers\Admin\KodeAkunController;
use App\Http\Controllers\Admin\PembiayaanAnggotaController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProdukKoperasiController;
use App\Http\Controllers\Admin\SimpananSukarelaController;
use App\Http\Controllers\Admin\SimpananWajibController;
use App\Http\Controllers\Anggota\BayarController;
use App\Http\Controllers\Anggota\PembiayaanController;
use App\Http\Controllers\Anggota\RiwayatTransaksiController;
use App\Http\Controllers\Anggota\SimpananWajibController as AnggotaSimpananWajibController;
use App\Http\Controllers\Anggota\SimpananSukarelaController as AnggotaSimpananSukarelaController;
use App\Http\Controllers\Anggota\TopUpController;
use App\Http\Controllers\Anggota\TransferController;
use App\Http\Controllers\Mitra\TarikSaldoController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::resource('jenis-produk', JenisProdukController::class);
    Route::resource('produk-koperasi', ProdukKoperasiController::class);
    Route::resource('kode-akun', KodeAkunController::class);
    Route::resource('kas-masuk', KasMasukController::class);
    Route::resource('kas-keluar', KasKeluarController::class);
    Route::resource('pembiayaan', PembiayaanAnggotaController::class);
    Route::resource('gallery', GalleryController::class);

    Route::get('simpanan-wajib', [SimpananWajibController::class, 'index'])->name('admin.simpanan-wajib.index');
    Route::get('simpanan-wajib/export', [SimpananWajibController::class, 'export'])->name('admin.simpanan-wajib.export');
    Route::post('simpanan-wajib/import', [SimpananWajibController::class, 'import'])->name('admin.simpanan-wajib.import');

    Route::get('simpanan-sukarela', [SimpananSukarelaController::class, 'index'])->name('admin.simpanan-sukarela.index');
    Route::get('simpanan-sukarela/show/{id}', [SimpananSukarelaController::class, 'show'])->name('admin.simpanan-sukarela.show');
    Route::get('simpanan-sukarela/export', [SimpananSukarelaController::class, 'export'])->name('admin.simpanan-sukarela.export');
    Route::post('simpanan-sukarela/import', [SimpananSukarelaController::class, 'import'])->name('admin.simpanan-sukarela.import');
    Route::get('simpanan-sukarela/cairkan/{id}', [SimpananSukarelaController::class, 'cairkanSimpanan'])->name('admin.simpanan-sukarela.cairkan');
    Route::post('simpanan-sukarela/storePencairan', [SimpananSukarelaController::class, 'storePencairan'])->name('admin.simpanan-sukarela.storePencairan');

    //Anggota
    Route::get('sim-wajib', [AnggotaSimpananWajibController::class, 'index'])->name('anggota.sim-wajib.index');
    Route::get('sim-wajib/show/{id}', [AnggotaSimpananWajibController::class, 'show'])->name('anggota.sim-wajib.show');

    Route::get('sim-sukarela', [AnggotaSimpananSukarelaController::class, 'index'])->name('anggota.sim-sukarela.index');
    Route::get('sim-sukarela/show/{id}', [AnggotaSimpananSukarelaController::class, 'show'])->name('anggota.sim-sukarela.show');
    Route::get('sim-sukarela/tarik', [AnggotaSimpananSukarelaController::class, 'tarik'])->name('anggota.sim-sukarela.tarik');
    Route::post('sim-sukarela/tarikStore', [AnggotaSimpananSukarelaController::class, 'tarikStore'])->name('anggota.sim-sukarela.tarikStore');
    Route::get('sim-sukarela/detailpenarikan', [AnggotaSimpananSukarelaController::class, 'detailPenarikan'])->name('anggota.sim-sukarela.detailpenarikan');

    Route::get('riwayat-transaksi', [RiwayatTransaksiController::class, 'index'])->name('anggota.riwayat-transaksi.index');
    Route::get('riwayat-transaksi/show/{id}', [RiwayatTransaksiController::class, 'show'])->name('anggota.riwayat-transaksi.show');

    Route::get('bayar', [BayarController::class, 'index'])->name('anggota.bayar.index');
    Route::get('bayar/cari', [BayarController::class, 'cari'])->name('anggota.bayar.cari');
    Route::post('bayar/store', [BayarController::class, 'store'])->name('anggota.bayar.store');
    Route::get('bayar/sukses', [BayarController::class, 'sukses'])->name('anggota.bayar.sukses');

    Route::get('topup', [TopUpController::class, 'index'])->name('anggota.topup.index');
    Route::get('topup/cash', [TopUpController::class, 'topUpCash'])->name('anggota.topup.cash');
    Route::post('topup/store', [TopUpController::class, 'store'])->name('anggota.topup.store');
    Route::get('topup/konfirmasi', [TopUpController::class, 'konfirmasi'])->name('anggota.topup.konfirmasi');
    Route::get('topup/sukarela', [TopUpController::class, 'topUpSukarela'])->name('anggota.topup.sukarela');
    Route::post('topup/storeSukarela', [TopUpController::class, 'storeSukarela'])->name('anggota.topup.storeSukarela');

    Route::get('transfer', [TransferController::class, 'index'])->name('anggota.transfer.index');
    Route::get('transfer/manual', [TransferController::class, 'manualTransfer'])->name('anggota.transfer.manual');
    Route::get('transfer/fetch', [TransferController::class, 'fetch'])->name('anggota.transfer.fetch');
    Route::post('transfer/simpanManualTransfer', [TransferController::class, 'simpanManualTransfer'])->name('anggota.transfer.simpanManualTransfer');
    Route::get('transfer/scantransfer', [TransferController::class, 'scantransfer'])->name('anggota.transfer.scantransfer');
    Route::get('transfer/cari', [TransferController::class, 'cari'])->name('anggota.transfer.cari');
    Route::post('transfer/kirimSaldo', [TransferController::class, 'kirimSaldo'])->name('anggota.transfer.kirimSaldo');

    Route::get('pengajuan-pembiayaan', [PembiayaanController::class, 'index'])->name('anggota.pembiayaan.index');
    Route::get('pengajuan-pembiayaan/create', [PembiayaanController::class, 'create'])->name('anggota.pembiayaan.create');
    Route::post('pengajuan-pembiayaan/store', [PembiayaanController::class, 'store'])->name('anggota.pembiayaan.store');

    //Mitra
    Route::get('tarik', [TarikSaldoController::class, 'index'])->name('mitra.tarik.index');


    //All
    Route::get('profil', [ProfilController::class, 'index'])->name('profil.index');
});
