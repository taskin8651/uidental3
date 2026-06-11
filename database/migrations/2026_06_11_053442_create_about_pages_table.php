<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutPagesTable extends Migration
{
    public function up()
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();

            $table->string('badge_text')->nullable();
            $table->string('title')->nullable();

            $table->longText('description_one')->nullable();
            $table->longText('description_two')->nullable();

            $table->string('image_alt')->nullable();

            $table->string('card_title')->nullable();
            $table->string('card_subtitle')->nullable();

            $table->string('google_rating')->nullable();
            $table->string('patient_reviews')->nullable();
            $table->string('clinic_availability')->nullable();
            $table->string('clinic_location')->nullable();

            $table->json('points')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_pages');
    }
}