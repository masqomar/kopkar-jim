<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';
    public $timestamps = false;

    protected $fillable = [
        'foto_gallery',
        'judul_gallery',
        'caption_gallery'
    ];
}
