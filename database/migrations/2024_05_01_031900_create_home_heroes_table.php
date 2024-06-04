<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('section1_title')->nullable();
            $table->string('section1_subtitle')->nullable();
            $table->string('section1_photo')->nullable();
            $table->string('section1_url')->nullable();

            $table->string('section2_photo')->nullable();
            $table->string('section2_list1')->nullable();
            $table->string('section2_list1_val')->nullable();
            $table->string('section2_list2')->nullable();
            $table->string('section2_list2_val')->nullable();
            $table->string('section2_list3')->nullable();
            $table->string('section2_list3_val')->nullable();

            $table->string('section3_title')->nullable();
            $table->string('section3_subtitle')->nullable();
            $table->string('section3_photo')->nullable();
            $table->string('section3_vid1')->nullable();
            $table->string('section3_vid2')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
