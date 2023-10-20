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
        Schema::create('igdb_games_themes', function (Blueprint $table) {
            
            $table->foreignId('game')
                ->references('id')
                ->on('igdb_games')
                ->cascadeOnDelete();

            $table->foreignId('theme')
                ->references('id')
                ->on('igdb_themes')
                ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('igdb_games_themes');
    }
};
