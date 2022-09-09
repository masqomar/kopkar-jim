<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSimpananAnggota extends Model
{
    use HasFactory;

    protected $table = 'tr_simpanan_anggota';
    public $timestamps = false;

    protected $fillable = [
        'nominal_tarik',
        'keterangan',
        'tgl_tarik',
        'user_id',
        'produk_id',
        'status',
        'bukti_transfer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produkKoperasi()
    {
        return $this->belongsTo(ProdukKoperasi::class, 'produk_id', 'id');
    }
}
