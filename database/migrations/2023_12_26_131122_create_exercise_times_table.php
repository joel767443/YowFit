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
        Schema::create('exercise_times', function (Blueprint $table) {
            $table->id();
            $table->time('exercise_time_from');
            $table->time('exercise_time_to');
            $table->foreignId('schedule_id')->index()->constrained();
            $table->foreignId('exercise_id')->index()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_times');
    }
};
