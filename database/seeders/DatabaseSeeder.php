<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            WorkSeeder::class,
            RestSeeder::class,
            MealTypeSeeder::class,
            MealSeeder::class,
            ExerciseTypeSeeder::class,
            ExerciseSeeder::class,
            ScheduleTimeSeeder::class,
            WeightTrackingSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
