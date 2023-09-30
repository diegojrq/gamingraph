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
        Schema::create('steam_apps_price_history', function (Blueprint $table) {
            $table->id('steam_appid');
            $table->string('currency');
            $table->integer('initial');
            $table->integer('final');
            $table->double('discount_percent');
            $table->string('initial_formatted');
            $table->string('final_formatted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('steam_apps_price_history');
    }
};
