<?php

namespace Database\Factories;

use App\Models\EatingTime;
use App\Models\Meal;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EatingTime>
 */
class EatingTimeFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = EatingTime::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $schedule = Schedule::factory()->create();
        $meal = Meal::factory()->create();

        return [
            'eating_time_from' => $this->faker->time,
            'eating_time_to' => $this->faker->time,
            'schedule_id' => $schedule->id,
            'meal_id' => $meal->id,
        ];
    }
}
