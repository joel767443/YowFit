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
        Schema::create('eating_times', function (Blueprint $table) {
            $table->id();
            $table->time('eating_time_from');
            $table->time('eating_time_to');
            $table->foreignId('meal_id')->index()->constrained();
            $table->foreignId('schedule_id')->index()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eating_times');
    }
};
