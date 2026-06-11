<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Doctor extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'badge_text',
        'heading',
        'description',
        'doctor_name',
        'doctor_title',
        'doctor_subtitle',
        'image_alt',
        'rating_text',
        'review_text',
        'timing_days',
        'timing_hours',
        'qualification_label',
        'qualification_value',
        'specialization_label',
        'specialization_value',
        'consultation_label',
        'consultation_value',
        'care_focus_label',
        'care_focus_value',
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
        $file = $this->getMedia('doctor_image')->last();

        if ($file) {
            return $file->getUrl();
        }

        return 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=900&q=85';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('doctor_image')->singleFile();
    }
}