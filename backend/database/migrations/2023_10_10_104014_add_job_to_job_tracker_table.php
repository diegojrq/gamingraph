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
        Schema::table('job_tracker', function (Blueprint $table) {
            $table->foreignId('job')
            ->nullable()
            ->references('id')
            ->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_tracker', function (Blueprint $table) {
            //
        });
    }
};
