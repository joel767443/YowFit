<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class EatingTimeSeeder
 */
class EatingTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mondayToFridaySchedule = Schedule::all();
        $eatingTimes = [
            Carbon::createFromTime(7),
            Carbon::createFromTime(13),
            Carbon::createFromTime(19),
        ];

        foreach ($eatingTimes as $eatingTime) {
            foreach ($mondayToFridaySchedule as $schedule) {
                $meal = collect(Meal::pluck('id')->random())->random();
                DB::table('eating_times')->insert([
                    'eating_time_from' => $eatingTime,
                    'eating_time_to' => date('H:i:s', strtotime($eatingTime . ' + 30 minutes')),
                    'meal_id' => $meal,
                    'schedule_id' => $schedule->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
