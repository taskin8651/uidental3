<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentEnquiry extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'service_id',
        'full_name',
        'phone',
        'email',
        'preferred_date',
        'preferred_time',
        'service_required',
        'message',
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
