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
        Schema::create('steam_apps_details', function (Blueprint $table) {
            $table->id('steam_appid');
            $table->string('type');
            $table->string('name');
            $table->string('required_age');
            $table->boolean('is_free');
            $table->text('detailed_description');
            $table->text('short_description');
            $table->text('supported_languages');
            $table->text('header_image');
            $table->text('capsule_image');
            $table->text('capsule_imagev5');
            $table->string('website')->nullable();
            $table->text('background');
            $table->text('background_raw');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('steam_apps_details');
    }
};
