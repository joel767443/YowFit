<?php

namespace Database\Factories;

use App\Models\EatingTime;
use App\Models\Exercise;
use App\Models\ExerciseTime;
use App\Models\Meal;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EatingTime>
 */
class ExerciseTimeFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = ExerciseTime::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $schedule = Schedule::factory()->create();
        $exercise = Exercise::factory()->create();

        return [
            'exercise_time_from' => $this->faker->time,
            'exercise_time_to' => $this->faker->time,
            'schedule_id' => $schedule->id,
            'exercise_id' => $exercise->id,
        ];
    }
}
