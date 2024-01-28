<?php

namespace Database\Factories;

use App\Models\Exercise;
use App\Models\ScheduleTime;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ScheduleTime>
 */
class ScheduleTimeFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = ScheduleTime::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $schedule = Schedule::inRandomOrder()->first();
        $exercise = Exercise::factory()->create();

        return [
            'start_time' => $this->faker->time,
            'end_time' => $this->faker->time,
            'schedule_id' => $schedule->id,
            'scheduleable_id' => $exercise->id,
            'scheduleable_type' => Exercise::class,
        ];
    }
}
