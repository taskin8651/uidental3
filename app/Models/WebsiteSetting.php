<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WebsiteSetting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'site_title',
        'meta_description',
        'meta_keywords',
        'clinic_name',
        'clinic_subtitle',
        'phone',
        'whatsapp_number',
        'email',
        'short_address',
        'address',
        'working_hours',
        'sunday_hours',
        'google_rating',
        'patient_reviews',
        'facebook_url',
        'instagram_url',
        'footer_text',
    ];

    protected $appends = [
        'logo',
        'favicon',
        'phone_link',
        'whatsapp_link',
        'display_phone',
    ];

    public static function defaults()
    {
        return [
            'site_title'       => 'Sinha Dental Clinic Patna | Dental Clinic in Kidwaipuri, Patna',
            'meta_description' => 'Sinha Dental Clinic in Patna offers professional dental consultation, teeth cleaning, root canal, crowns, implants, braces, smile designing and emergency dental care.',
            'meta_keywords'    => 'Dental clinic in Patna, dentist in Patna, Sinha Dental Clinic, root canal Patna, teeth cleaning Patna, dental implant Patna, dentist Kidwaipuri Patna',
            'clinic_name'      => 'Sinha Dental',
            'clinic_subtitle'  => 'Clinic Patna',
            'phone'            => '08235147460',
            'whatsapp_number'  => '918235147460',
            'short_address'    => 'Kidwaipuri, Patna',
            'address'          => 'Shop No. 11, Sri Ram Kunj Apartment, E Boring Canal Rd, beside Yes Bank ATM, Nageshwar Colony, Kidwaipuri, Patna, Bihar 800001',
            'working_hours'    => 'Mon-Sat 9 AM - 7 PM',
            'sunday_hours'     => 'Sun: 9 AM - 2 PM',
            'google_rating'    => '4.5',
            'patient_reviews'  => '62+',
            'facebook_url'     => '#',
            'instagram_url'    => '#',
            'footer_text'      => '2026 Sinha Dental Clinic. All Rights Reserved.',
        ];
    }

    public static function current()
    {
        return static::firstOrCreate([], static::defaults());
    }

    public function value($key)
    {
        return $this->{$key} ?: (static::defaults()[$key] ?? null);
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();

        return $file ? $file->getUrl() : null;
    }

    public function getFaviconAttribute()
    {
        $file = $this->getMedia('favicon')->last();

        return $file ? $file->getUrl() : null;
    }

    public function getPhoneLinkAttribute()
    {
        return preg_replace('/\D+/', '', $this->value('phone'));
    }

    public function getWhatsappLinkAttribute()
    {
        return preg_replace('/\D+/', '', $this->value('whatsapp_number') ?: $this->value('phone'));
    }

    public function getDisplayPhoneAttribute()
    {
        return trim(chunk_split($this->value('phone'), 6, ' '));
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->singleFile();
        $this->addMediaCollection('favicon')->singleFile();
    }
}
