<?php

namespace Database\Factories;

use App\Models\EatingTime;
use App\Models\Meal;
use App\Models\Schedule;
use App\Models\User;
use App\Models\WorkTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WorkTime>
 */
class WorkTimeFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = WorkTime::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'work_time_from' => $this->faker->time,
            'work_time_to' => $this->faker->time,
            'type' => 'Personal',
        ];
    }
}
