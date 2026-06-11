<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AboutPage extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'badge_text',
        'title',
        'description_one',
        'description_two',
        'image_alt',
        'card_title',
        'card_subtitle',
        'google_rating',
        'patient_reviews',
        'clinic_availability',
        'clinic_location',
        'points',
    ];

    protected $casts = [
        'points' => 'array',
    ];

    protected $appends = [
        'image',
    ];

    public function getImageAttribute()
    {
        $file = $this->getMedia('about_image')->last();

        if ($file) {
            return $file->getUrl();
        }

        return 'https://images.unsplash.com/photo-1609840114035-3c981b782dfe?auto=format&fit=crop&w=850&q=85';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('about_image')->singleFile();
    }
}