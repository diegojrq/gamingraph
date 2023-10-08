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
        Schema::create('igdb_involved_companies', function (Blueprint $table) {
            $table->integer('id')->primary()->unique();

            $table->foreignId('company')
                ->nullable()
                ->references('id')
                ->on('igdb_companies');

            $table->datetime('created_at')->nullable();
            $table->boolean('developer')->nullable();

            $table->foreignId('game')
                ->nullable()
                ->references('id')
                ->on('igdb_games');

            $table->boolean('porting')->nullable();
            $table->boolean('publisher')->nullable();
            $table->boolean('supporting')->nullable();
            $table->datetime('updated_at')->nullable();

            $table->datetime('created_locally_at')->nullable();
            $table->datetime('updated_locally_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('igdb_involved_companies');
    }
};
