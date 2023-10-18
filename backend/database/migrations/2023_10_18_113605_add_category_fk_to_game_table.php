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
        Schema::table('igdb_games', function (Blueprint $table) {
            $table->integer('category')->unsigned()->change();
            $table->foreign('category')->references('id')->on('igdb_game_categories_enum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('igdb_games', function (Blueprint $table) {
            //
        });
    }
};
