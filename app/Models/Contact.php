<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'nama',
        'rw',
        'rt',
        'waktu',
        'lokasi',
        'deskripsi',
        'bukti',
    ];

    protected $casts = [
        'waktu' => 'datetime',
        'bukti' => 'array', // Menangani JSON otomatis sebagai array
    ];
}
