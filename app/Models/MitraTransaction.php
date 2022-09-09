<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitraTransaction extends Model
{
    use HasFactory;
    protected $table = 'kantin_transaction';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'kantin_id',
        'kredit',
        'debit',
        'tipe',
        'jenis',
        'tanggal',
        'metode',
        'deskripsi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
