<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tour extends Model
{
    protected $fillable = [
        'deskripsi',
        'foto'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($tour) {
            if ($tour->foto && Storage::exists($tour->foto)) {
                Storage::delete($tour->foto); // Hapus file dari storage
            }
        });
    }
}
