<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exercise;
use App\Models\Schedule;
use Faker\Factory as Faker;

class ExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get schedule IDs to associate exercises with schedules
        $scheduleIds = Schedule::pluck('id')->toArray();

        // Create 50 sample exercises
        foreach (range(1, 50) as $index) {
            Exercise::create([
                'schedule_id' => $faker->randomElement($scheduleIds),
                'time_of_day' => $faker->randomElement(['morning', 'afternoon', 'evening']),
                'activity' => $faker->sentence,
            ]);
        }
    }
}
