<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpananAnggota extends Model
{
    use HasFactory;

    protected $table = 'simpanan_anggota';
    public $timestamps = false;

    protected $fillable = [
        'jumlah',
        'periode_bulan',
        'periode_tahun',
        'tanggal_setor',
        'user_id',
        'produk_id'
    ];

    public function produkKoperasi()
    {
        return $this->belongsTo(ProdukKoperasi::class, 'produk_id', 'id');
    }
}
