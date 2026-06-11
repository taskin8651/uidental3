<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('icon_class')->nullable();
            $table->string('question');
            $table->text('answer')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('faqs')->insert([
            [
                'icon_class' => 'bi bi-clock-history',
                'question'   => 'What is the clinic timing?',
                'answer'     => 'Clinic timing is {working_hours} and {sunday_hours}.',
                'sort_order' => 1,
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon_class' => 'bi bi-calendar2-check',
                'question'   => 'Can I book appointment online?',
                'answer'     => 'Yes, you can submit the appointment enquiry form or call the clinic directly for quick booking support.',
                'sort_order' => 2,
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon_class' => 'bi bi-heart-pulse',
                'question'   => 'Which services are available?',
                'answer'     => 'Consultation, teeth cleaning, root canal, dental crown, implant, braces, smile designing and emergency dental care are available.',
                'sort_order' => 3,
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon_class' => 'bi bi-lightning-charge',
                'question'   => 'Can I visit for emergency dental pain?',
                'answer'     => 'Yes, you can call the clinic for urgent dental pain, swelling or emergency dental care support before visiting.',
                'sort_order' => 4,
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $permissions = [
            'faq_create',
            'faq_edit',
            'faq_delete',
            'faq_access',
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
        Schema::dropIfExists('faqs');
    }
}
