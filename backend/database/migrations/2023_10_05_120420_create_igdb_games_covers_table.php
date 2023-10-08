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
        Schema::create('igdb_games_covers', function (Blueprint $table) {
            $table->id();
            $table->boolean('alpha_channel')->nullable();
            $table->boolean('animated')->nullable();            
            $table->string('checksum')->nullable();
            $table->integer('game')->nullable();
            $table->integer('height')->nullable();
            $table->string('image_id')->nullable();
            $table->string('url')->nullable();
            $table->integer('width')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('igdb_games_covers');
    }
};
