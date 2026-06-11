<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePatientReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('patient_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('avatar_letter', 5)->nullable();
            $table->string('title')->default('Patient Review');
            $table->string('service_name')->nullable();
            $table->decimal('rating', 2, 1)->default(5);
            $table->text('review_text')->nullable();
            $table->string('badge_text')->nullable();
            $table->string('badge_icon')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('patient_reviews')->insert([
            [
                'avatar_letter' => 'A',
                'title'         => 'Patient Review',
                'service_name'  => 'Teeth Cleaning',
                'rating'        => 5,
                'review_text'   => 'Professional cleaning support with patient-friendly explanation and hygiene-focused care.',
                'badge_text'    => 'Hygiene Focus',
                'badge_icon'    => 'bi bi-shield-check',
                'sort_order'    => 1,
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'avatar_letter' => 'S',
                'title'         => 'Patient Review',
                'service_name'  => 'Root Canal Treatment',
                'rating'        => 4.5,
                'review_text'   => 'Comfort-focused treatment guidance for tooth pain and root canal care support.',
                'badge_text'    => 'Comfort Care',
                'badge_icon'    => 'bi bi-heart-pulse-fill',
                'sort_order'    => 2,
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'avatar_letter' => 'P',
                'title'         => 'Patient Review',
                'service_name'  => 'Dental Crown',
                'rating'        => 5,
                'review_text'   => 'Helpful explanation of dental crown treatment and easy appointment support.',
                'badge_text'    => 'Appointment Support',
                'badge_icon'    => 'bi bi-calendar2-check-fill',
                'sort_order'    => 3,
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'avatar_letter' => 'N',
                'title'         => 'Patient Review',
                'service_name'  => 'Dental Implant',
                'rating'        => 5,
                'review_text'   => 'Good consultation support for missing tooth replacement and dental implant guidance.',
                'badge_text'    => 'Implant Guidance',
                'badge_icon'    => 'bi bi-plus-circle-fill',
                'sort_order'    => 4,
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'avatar_letter' => 'K',
                'title'         => 'Patient Review',
                'service_name'  => 'Smile Designing',
                'rating'        => 4.5,
                'review_text'   => 'Friendly smile consultation and clear cosmetic dental care explanation.',
                'badge_text'    => 'Smile Care',
                'badge_icon'    => 'bi bi-emoji-smile-fill',
                'sort_order'    => 5,
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);

        $permissions = [
            'patient_review_create',
            'patient_review_edit',
            'patient_review_show',
            'patient_review_delete',
            'patient_review_access',
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
        Schema::dropIfExists('patient_reviews');
    }
}
