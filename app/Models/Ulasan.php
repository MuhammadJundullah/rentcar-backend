<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $fillable = [
        'nama',
        'judul',
        'isi',
        'ratings',
        'email',
        'ulasan',
    ];
}
