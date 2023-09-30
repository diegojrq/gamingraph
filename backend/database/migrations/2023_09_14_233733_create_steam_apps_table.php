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
        Schema::create('steam_apps', function (Blueprint $table) {
            $table->id('appid');
            $table->string('name');
            $table->bigInteger('last_modified');
            $table->bigInteger('price_change_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('steam_apps');
    }
};
