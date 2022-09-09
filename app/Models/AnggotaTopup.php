<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaTopup extends Model
{
    use HasFactory;

    protected $table = 'anggota_topup';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'nominal_topup',
        'tgl_topup',
        'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
