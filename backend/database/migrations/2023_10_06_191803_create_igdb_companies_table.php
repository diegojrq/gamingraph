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
        Schema::create('igdb_companies', function (Blueprint $table) {
            $table->integer('id')->primary()->unique();
            $table->integer('change_date')->nullable();
            $table->integer('change_date_category')->nullable();
            $table->string('checksum')->nullable();
            $table->datetime('created_at')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('start_date_category')->nullable();
            $table->datetime('updated_at')->nullable();            
            $table->string('url')->nullable();

            $table->datetime('created_locally_at')->nullable();
            $table->datetime('updated_locally_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('igdb_companies');
    }
};
