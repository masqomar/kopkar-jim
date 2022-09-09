<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasKoperasi extends Model
{
    use HasFactory;
    protected $table = 'kas_koperasi';

    public $timestamps = false;

    protected $fillable = [
        'jenis_kas',
        'jumlah_masuk',
        'jumlah_keluar',
        'akun_id',
        'keterangan',
        'tgl_transaksi'
    ];

    public function kodeAkun()
    {
        return $this->belongsTo(KodeAkun::class, 'akun_id', 'id');
    }
}
