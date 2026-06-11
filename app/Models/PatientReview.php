<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientReview extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'avatar_letter',
        'title',
        'service_name',
        'rating',
        'review_text',
        'badge_text',
        'badge_icon',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'rating' => 'float',
        'status' => 'boolean',
    ];
}
