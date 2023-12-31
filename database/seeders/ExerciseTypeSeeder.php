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
            "Power lifting",
            "Intense training",
            "Casual"
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
