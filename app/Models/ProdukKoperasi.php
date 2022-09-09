<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukKoperasi extends Model
{
    use HasFactory;
    protected $table = 'produk_koperasi';

    public $timestamps = false;

    protected $fillable = [
        'nama_produk',
        'poto_produk',
        'jenis_produk_id',
        'desk_produk'
    ];

    public function jenisProduk()
    {
        return $this->belongsTo(JenisProduk::class);
    }
}
