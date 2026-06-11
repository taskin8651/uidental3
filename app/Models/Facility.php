<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Facility extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'number',
        'title',
        'description',
        'image_alt',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $appends = [
        'image',
    ];

    public function getImageAttribute()
    {
        $file = $this->getMedia('facility_image')->last();

        if ($file) {
            return $file->getUrl();
        }

        return 'https://images.unsplash.com/photo-1629909615184-74f495363b67?auto=format&fit=crop&w=600&q=85';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('facility_image')->singleFile();
    }
}