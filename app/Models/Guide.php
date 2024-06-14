<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_game';

    protected $fillable = [
        'nama_game',
        'gambar_game',
        'video_game',
        'deskripsi_game',

    ];
}
