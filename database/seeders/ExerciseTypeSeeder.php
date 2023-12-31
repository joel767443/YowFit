<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExerciseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exerciseTypes = [
            "Aerobics",
            "Powerlifting",
            "High-Intensity Interval Training (HIIT)",
            "Yoga",
            "CrossFit",
            "Bodyweight Training",
            "Running",
            "Swimming",
            "Cycling",
            "Pilates",
            "Martial Arts",
            "Strength Training",
            "Flexibility and Stretching",
            "Functional Training",
            "Cardiovascular Exercise",
            "Dance Fitness",
            "Endurance Training",
            "Outdoor Activities",
            "Group Fitness Classes",
            "Calisthenics",
        ];

        foreach ($exerciseTypes as $type) {

            DB::table('exercise_types')->insert([
                'name' => $type,
                'slug' => Str::slug($type),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
