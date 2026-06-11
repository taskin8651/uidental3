<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Service extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'number',
        'icon_class',
        'category',
        'tag',
        'title',
        'slug',
        'short_description',
        'point_one',
        'point_two',
        'card_style',
        'overview_badge_text',
        'overview_heading',
        'overview_description_one',
        'overview_description_two',
        'overview_image_alt',
        'overview_card_title',
        'overview_card_subtitle',
        'overview_points',
        'symptoms',
        'process_steps',
        'benefits',
        'aftercare_points',
        'faqs',
        'seo_title',
        'seo_description',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'status'           => 'boolean',
        'overview_points'  => 'array',
        'symptoms'         => 'array',
        'process_steps'    => 'array',
        'benefits'         => 'array',
        'aftercare_points' => 'array',
        'faqs'             => 'array',
    ];

    protected $appends = [
        'overview_image',
    ];

    public function getOverviewImageAttribute()
    {
        $file = $this->getMedia('overview_image')->last();

        if ($file) {
            return $file->getUrl();
        }

        return 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=900&q=85';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('overview_image')->singleFile();
    }
}