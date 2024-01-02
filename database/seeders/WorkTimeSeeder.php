<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mondayToFridaySchedule = Schedule::all();
        $workTimes = [
            Carbon::createFromTime(12, 00),
            Carbon::createFromTime(13, 00),
            Carbon::createFromTime(17, 00),
        ];

        $workTypes = [
            'Job',
            'Personal',
            'Freelance',
        ];

        foreach ($workTimes as $workTime) {
            foreach ($mondayToFridaySchedule as $schedule) {
                DB::table('work_times')->insert([
                    'work_time_from' => $workTime,
                    'work_time_to' => date('H:i:s', strtotime($workTime . ' + 2 hours')),
                    'schedule_id' => $schedule->id,
                    'type' => collect($workTypes)->random(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
