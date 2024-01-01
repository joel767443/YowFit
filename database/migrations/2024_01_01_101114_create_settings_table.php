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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->double('hours_sleep')->nullable();
            $table->time('sleeping_time')->nullable();
            $table->time('wakeup_time')->nullable();
            $table->string('weighing_frequency')->nullable();
            $table->integer('exercises_per_day')->nullable();
            $table->integer('meals_per_day')->nullable();
            $table->json('eating_times')->nullable();
            $table->json('exercise_times')->nullable();
            $table->json('work_times')->nullable();
            $table->json('relaxation_times')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
