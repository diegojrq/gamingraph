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
        Schema::create('job_tracker', function (Blueprint $table) {
            $table->id();
            $table->string('job_name');
            $table->string('job_status');
            $table->text('job_outcome')->nullable();
            $table->timestamp('job_start')->nullable();
            $table->timestamp('job_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_tracker');
    }
};
