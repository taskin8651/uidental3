<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->string('number')->nullable();
            $table->string('icon_class')->nullable();

            $table->string('category')->nullable();
            $table->string('tag')->nullable();

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('short_description')->nullable();

            $table->string('point_one')->nullable();
            $table->string('point_two')->nullable();

            $table->string('card_style')->default('normal'); // normal, featured, urgent

            $table->string('overview_badge_text')->nullable();
            $table->string('overview_heading')->nullable();
            $table->longText('overview_description_one')->nullable();
            $table->longText('overview_description_two')->nullable();

            $table->string('overview_image_alt')->nullable();
            $table->string('overview_card_title')->nullable();
            $table->string('overview_card_subtitle')->nullable();

            $table->json('overview_points')->nullable();
            $table->json('symptoms')->nullable();
            $table->json('process_steps')->nullable();
            $table->json('benefits')->nullable();
            $table->json('aftercare_points')->nullable();
            $table->json('faqs')->nullable();

            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}