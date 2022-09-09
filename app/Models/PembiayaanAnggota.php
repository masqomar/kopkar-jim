<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembiayaanAnggota extends Model
{
    use HasFactory;
    protected $table = 'pembiayaan_anggota';

    public $timestamps = false;

    protected $fillable = [
        'kode_pembiayaan',
        'jumlah-pembiayaan',
        'tgl_pembiayaan',
        'jangka_waktu',
        'bayar_perbulan',
        'total_bayar',
        'tgl_selesai',
        'status_pembiayaan',
        'keterangan'
    ];

    public function pengajuanPembiayaan()
    {
        return $this->belongsTo(PengajuanPembiayaan::class, 'kode_pembiayaan', 'kode_pembiayaan');
    }
}
