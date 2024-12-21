<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Aktivitas extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($aktivitas) {
            if ($aktivitas->foto && Storage::exists($aktivitas->foto)) {
                Storage::delete($aktivitas->foto); // Hapus file dari storage
            }
        });
    }

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'foto'
    ];
}
