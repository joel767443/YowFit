<?php

namespace Database\Factories;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Setting>
 */
class SettingFactory extends Factory
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
            'hours_sleep' => 8,
            'sleeping_time' => $this->faker->time,
            'wakeup_time' => $this->faker->time,
            'weighing_frequency' => 'Weekly',
            'exercises_per_day' => 3,
            'meals_per_day' => 3,
            'eating_times' => ['12:00', '17:00'],
            'exercise_times' => ['08:00', '12:30'],
            'work_times' => ['09:00', '13:30'],
            'relaxation_times' => ['08:00', '12:30'],
        ];
    }
}
