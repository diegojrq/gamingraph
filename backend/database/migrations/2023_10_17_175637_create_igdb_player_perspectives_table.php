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
        Schema::create('igdb_player_perspectives', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->datetime('created_at');
            $table->datetime('updated_at');
            $table->string('name');
            $table->string('checksum')->nullable();
            $table->string('slug');
            $table->string('url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('igdb_player_perspectives');
    }
};
