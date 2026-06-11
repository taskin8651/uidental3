<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTables extends Migration
{
    public function up()
    {
        Schema::create('appointment_enquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained('services')->nullOnDelete();
            $table->string('full_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->date('preferred_date')->nullable();
            $table->string('preferred_time')->nullable();
            $table->string('service_required')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('contact_enquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained('services')->nullOnDelete();
            $table->string('full_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->date('preferred_date')->nullable();
            $table->string('preferred_time')->nullable();
            $table->string('service_required')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        $permissions = [
            'appointment_enquiry_show',
            'appointment_enquiry_delete',
            'appointment_enquiry_access',
            'contact_enquiry_show',
            'contact_enquiry_delete',
            'contact_enquiry_access',
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
        Schema::dropIfExists('contact_enquiries');
        Schema::dropIfExists('appointment_enquiries');
    }
}
