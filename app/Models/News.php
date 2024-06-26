<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_news';

    protected $fillable = [
        'nama_news',
        'gambar_news',
        'video_news',
        'deskripsi_news',
    ];
}
