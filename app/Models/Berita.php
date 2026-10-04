<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'beritas';

    protected $fillable = [
        'judul',
        'kategori',
        'tanggal',
        'isi',
        'gambar',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}