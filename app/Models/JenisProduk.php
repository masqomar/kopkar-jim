<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProduk extends Model
{
    use HasFactory;

    protected $table = 'jenis_produk';
    public $timestamps = false;

    protected $fillable = [
        'jenis_produk',
        'desk_jenis'
    ];
}
