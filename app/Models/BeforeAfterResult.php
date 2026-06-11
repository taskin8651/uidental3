<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BeforeAfterResult extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'tag',
        'title',
        'description',
        'before_image_alt',
        'after_image_alt',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $appends = [
        'before_image',
        'after_image',
    ];

    public function getBeforeImageAttribute()
    {
        $file = $this->getMedia('before_image')->last();

        if ($file) {
            return $file->getUrl();
        }

        return 'https://images.unsplash.com/photo-1606811841689-23dfddce3e95?auto=format&fit=crop&w=700&q=85';
    }

    public function getAfterImageAttribute()
    {
        $file = $this->getMedia('after_image')->last();

        if ($file) {
            return $file->getUrl();
        }

        return 'https://images.unsplash.com/photo-1609840114035-3c981b782dfe?auto=format&fit=crop&w=700&q=85';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('before_image')->singleFile();
        $this->addMediaCollection('after_image')->singleFile();
    }
}