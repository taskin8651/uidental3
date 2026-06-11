<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('clinic_name')->nullable();
            $table->string('clinic_subtitle')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('email')->nullable();
            $table->string('short_address')->nullable();
            $table->longText('address')->nullable();
            $table->string('working_hours')->nullable();
            $table->string('sunday_hours')->nullable();
            $table->string('google_rating')->nullable();
            $table->string('patient_reviews')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->text('footer_text')->nullable();
            $table->timestamps();
        });

        DB::table('website_settings')->insert([
            'site_title'       => 'Sinha Dental Clinic Patna | Dental Clinic in Kidwaipuri, Patna',
            'meta_description' => 'Sinha Dental Clinic in Patna offers professional dental consultation, teeth cleaning, root canal, crowns, implants, braces, smile designing and emergency dental care.',
            'meta_keywords'    => 'Dental clinic in Patna, dentist in Patna, Sinha Dental Clinic, root canal Patna, teeth cleaning Patna, dental implant Patna, dentist Kidwaipuri Patna',
            'clinic_name'      => 'Sinha Dental',
            'clinic_subtitle'  => 'Clinic Patna',
            'phone'            => '08235147460',
            'whatsapp_number'  => '918235147460',
            'email'            => null,
            'short_address'    => 'Kidwaipuri, Patna',
            'address'          => 'Shop No. 11, Sri Ram Kunj Apartment, E Boring Canal Rd, beside Yes Bank ATM, Nageshwar Colony, Kidwaipuri, Patna, Bihar 800001',
            'working_hours'    => 'Mon-Sat 9 AM - 7 PM',
            'sunday_hours'     => 'Sun: 9 AM - 2 PM',
            'google_rating'    => '4.5',
            'patient_reviews'  => '62+',
            'facebook_url'     => '#',
            'instagram_url'    => '#',
            'footer_text'      => '2026 Sinha Dental Clinic. All Rights Reserved.',
            'created_at'       => now(),
            'updated_at'       => now(),
        ]);

        $permissions = [
            'website_setting_access',
            'website_setting_edit',
        ];

        foreach ($permissions as $permission) {
            $permissionId = DB::table('permissions')->where('title', $permission)->value('id');

            if (! $permissionId) {
                $permissionId = DB::table('permissions')->insertGetId([
                    'title'      => $permission,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            if (DB::table('roles')->where('id', 1)->exists()) {
                DB::table('permission_role')->updateOrInsert([
                    'role_id'       => 1,
                    'permission_id' => $permissionId,
                ]);
            }
        }
    }

    public function down()
    {
        Schema::dropIfExists('website_settings');
    }
}
