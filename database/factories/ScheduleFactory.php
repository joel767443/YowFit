<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user = User::factory()->create();

        return [
            'user_id' => $user->id,
            'day_of_week' => $this->faker->dayOfWeek,
            'wakeup_time' => $this->faker->time,
            'sleeping_time' => $this->faker->time,
        ];
    }
}
