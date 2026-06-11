<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            $table->string('badge_text')->nullable();
            $table->string('heading')->nullable();
            $table->longText('description')->nullable();

            $table->string('doctor_name')->nullable();
            $table->string('doctor_title')->nullable();
            $table->string('doctor_subtitle')->nullable();

            $table->string('image_alt')->nullable();

            $table->string('rating_text')->nullable();
            $table->string('review_text')->nullable();

            $table->string('timing_days')->nullable();
            $table->string('timing_hours')->nullable();

            $table->string('qualification_label')->nullable();
            $table->string('qualification_value')->nullable();

            $table->string('specialization_label')->nullable();
            $table->string('specialization_value')->nullable();

            $table->string('consultation_label')->nullable();
            $table->string('consultation_value')->nullable();

            $table->string('care_focus_label')->nullable();
            $table->string('care_focus_value')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}