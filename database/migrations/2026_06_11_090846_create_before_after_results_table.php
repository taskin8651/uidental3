<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeforeAfterResultsTable extends Migration
{
    public function up()
    {
        Schema::create('before_after_results', function (Blueprint $table) {
            $table->id();

            $table->string('tag')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();

            $table->string('before_image_alt')->nullable();
            $table->string('after_image_alt')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('before_after_results');
    }
}