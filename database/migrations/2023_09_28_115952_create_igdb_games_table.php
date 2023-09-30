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
        Schema::create('igdb_games', function (Blueprint $table) {
            $table->integer('id');

            $table->double('aggregated_rating')->nullable();
            $table->integer('aggregated_rating_count')->nullable();
            $table->integer('category')->nullable();
            $table->string('checksum')->nullable();
            $table->integer('cover')->nullable();
            $table->datetime('created_at')->nullable();
            $table->datetime('first_release_date')->nullable();
            $table->integer('follows')->nullable();
            $table->integer('hypes')->nullable();
            $table->string('name')->nullable();
            $table->integer('parent_game')->nullable();
            $table->double('rating')->nullable();
            $table->integer('rating_count')->nullable();
            $table->string('slug')->nullable();
            $table->integer('status')->nullable();
            $table->text('storyline')->nullable();
            $table->text('summary')->nullable();
            $table->double('total_rating')->nullable();
            $table->integer('total_rating_count')->nullable();
            $table->datetime('updated_at')->nullable();
            $table->string('url')->nullable();
            $table->integer('version_parent')->nullable();
            $table->string('version_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('igdb_games');
    }
};
