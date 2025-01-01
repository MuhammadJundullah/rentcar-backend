<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = [
        'name',
        'armada',
        'email',
        'pesan',
        'nomor_telepon',
        'tanggal',
        'jumlah_orang',
        'pesan'
    ];
}
