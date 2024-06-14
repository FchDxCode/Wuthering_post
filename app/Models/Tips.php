<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tips extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tips';

    protected $fillable = [
        'nama_tips',
        'gambar_tips',
        'video_tips',
        'deskripsi_tips',
    ];
}
