<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ExerciseTimeSeeder
 */
class ExerciseTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exerciseTimes = [
            Carbon::createFromTime(6),
            Carbon::createFromTime(13, 30),
            Carbon::createFromTime(19, 30),
        ];

        foreach ($exerciseTimes as $exerciseTime) {
            $exerciseId = collect(Exercise::pluck('id')->random())->random();
            DB::table('exercise_times')->insert([
                'time' => $exerciseTime,
                'exercise_id' => $exerciseId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
