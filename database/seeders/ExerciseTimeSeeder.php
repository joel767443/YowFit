<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\Schedule;
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
        $mondayToFridaySchedule = Schedule::all();
        $exerciseTimes = [
            Carbon::createFromTime(6),
            Carbon::createFromTime(13, 30),
            Carbon::createFromTime(19, 30),
        ];

        foreach ($exerciseTimes as $exerciseTime) {
            foreach ($mondayToFridaySchedule as $schedule) {
                $exerciseId = collect(Exercise::pluck('id')->random())->random();
                DB::table('exercise_times')->insert([
                    'exercise_time_from' => $exerciseTime,
                    'exercise_time_to' => date('H:i:s', strtotime($exerciseTime . ' + 30 minutes')),
                    'exercise_id' => $exerciseId,
                    'schedule_id' => $schedule->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
