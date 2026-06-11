<?php

namespace App\Providers;

use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('frontend.*', function ($view) {
            $websiteSetting = null;

            if (Schema::hasTable('website_settings')) {
                $websiteSetting = WebsiteSetting::current();
            }

            $settingValue = function ($key, $default = '') use ($websiteSetting) {
                return $websiteSetting ? $websiteSetting->value($key) : $default;
            };

            $view->with([
                'websiteSetting' => $websiteSetting,
                'clinicName'     => $settingValue('clinic_name', 'Sinha Dental'),
                'clinicSubtitle' => $settingValue('clinic_subtitle', 'Clinic Patna'),
                'phoneLink'      => $websiteSetting->phone_link ?? '08235147460',
                'displayPhone'   => $websiteSetting->display_phone ?? '082351 47460',
                'whatsappLink'   => $websiteSetting->whatsapp_link ?? '918235147460',
                'shortAddress'   => $settingValue('short_address', 'Kidwaipuri, Patna'),
                'fullAddress'    => $settingValue('address', 'Shop No. 11, Sri Ram Kunj Apartment, E Boring Canal Rd, beside Yes Bank ATM, Nageshwar Colony, Kidwaipuri, Patna, Bihar 800001'),
                'workingHours'   => $settingValue('working_hours', 'Mon-Sat 9 AM - 7 PM'),
                'sundayHours'    => $settingValue('sunday_hours', 'Sun: 9 AM - 2 PM'),
                'googleRating'   => $settingValue('google_rating', '4.5'),
                'patientReviewCount' => $settingValue('patient_reviews', '62+'),
                'footerText'     => $settingValue('footer_text', '2026 Sinha Dental Clinic. All Rights Reserved.'),
            ]);
        });
    }
}
