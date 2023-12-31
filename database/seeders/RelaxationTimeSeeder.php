<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class RelaxationTimeSeeder
 */
class RelaxationTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mondayToFridaySchedule = Schedule::all();
        $eatingTimes = [
            Carbon::createFromTime(12, 00),
            Carbon::createFromTime(20, 00),
        ];

        foreach ($eatingTimes as $eatingTime) {
            foreach ($mondayToFridaySchedule as $schedule) {
                DB::table('relaxation_times')->insert([
                    'time' => $eatingTime,
                    'description' => 'watch TV',
                    'schedule_id' => $schedule->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
