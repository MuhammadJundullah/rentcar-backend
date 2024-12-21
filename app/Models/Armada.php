<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Storage;

class Armada extends Model implements HasMedia
{
    //
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'nama',
        'kelas',
        'harga',
        'foto'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($armada) {
            if ($armada->foto && Storage::exists($armada->foto)) {
                Storage::delete($armada->foto); // Hapus file dari storage
            }
        });
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->nonQueued()
            ->addMediaCollection('foto')
            ->singleFile();
    }
}
