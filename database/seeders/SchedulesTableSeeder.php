<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\User;
use Faker\Factory as Faker;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get user IDs to associate schedules with users
        $userIds = User::pluck('id')->toArray();

        // Create 50 sample schedules
        foreach (range(1, 50) as $index) {
            Schedule::create([
                'user_id' => $faker->randomElement($userIds),
                'day_of_week' => $faker->randomElement(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']),
                'wakeup_time' => $faker->time('H:i'),
                'exercise_time' => $faker->time('H:i'),
                'eating_time' => $faker->time('H:i'),
                'sleeping_time' => $faker->time('H:i'),
                'relaxation_time' => $faker->time('H:i'),
            ]);
        }
    }
}
