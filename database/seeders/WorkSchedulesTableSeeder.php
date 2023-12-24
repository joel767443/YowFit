<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WorkSchedule;
use App\Models\User;
use Faker\Factory as Faker;

class WorkSchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get user IDs to associate work schedules with users
        $userIds = User::pluck('id')->toArray();

        // Create 50 sample work schedules
        foreach (range(1, 50) as $index) {
            WorkSchedule::create([
                'user_id' => $faker->randomElement($userIds),
                'day_of_week' => $faker->randomElement(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']),
                'time_slot' => $faker->time('H:i'),
                'category' => $faker->randomElement(['Personal', 'Job-related', 'R&D', 'Other']),
            ]);
        }
    }
}
