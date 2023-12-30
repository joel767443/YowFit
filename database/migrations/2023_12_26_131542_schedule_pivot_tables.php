<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // schedule_exercise_time Pivot Table
        Schema::create('schedule_exercise_time', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained();
            $table->foreignId('exercise_time_id')->constrained();
            $table->timestamps();
        });

        // schedule_eating_time Pivot Table
        Schema::create('schedule_eating_time', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained();
            $table->foreignId('eating_time_id')->constrained();
            $table->timestamps();
        });

        // schedule_relaxation_time Pivot Table
        Schema::create('schedule_relaxation_time', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained();
            $table->foreignId('relaxation_time_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_exercise_time');
        Schema::dropIfExists('schedule_eating_time');
        Schema::dropIfExists('schedule_relaxation_time');
    }
};
