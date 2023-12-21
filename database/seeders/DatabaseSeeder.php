<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ExerciseSeeder::class,
            MealSeeder::class,
            ActivitiesSeeder::class,
            ScheduleSeeder::class,
            CalendarEntrySeeder::class,
        ]);
    }
}
