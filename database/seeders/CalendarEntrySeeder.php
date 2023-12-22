<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

/**
 * Class CalendarEntrySeeder
 */
class CalendarEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $weekDays = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
        $weekEndDays = ["Saturday", "Sunday"];
        $activityTypes = DB::table('activity_types')->get();
        $schedule = [];

        foreach ($weekDays as $weekDay) {
            $schedule[] = [
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'wakeup')->first()->id, 'day_of_week' => $weekDay, 'start_time' => '06:00:00', 'end_time' => '06:00:00','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'exercise')->first()->id, 'day_of_week' => $weekDay, 'start_time' => '06:00:00', 'end_time' => '07:00:00','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'work')->first()->id, 'day_of_week' => $weekDay, 'start_time' => '07:00:00', 'end_time' => '10:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'break')->first()->id, 'day_of_week' => $weekDay, 'start_time' => '10:00:00', 'end_time' => '10:30:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'work')->first()->id, 'day_of_week' => $weekDay, 'start_time' => '10:30:00', 'end_time' => '13:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'lunch')->first()->id, 'day_of_week' => $weekDay, 'start_time' => '13:00:00', 'end_time' => '14:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'work')->first()->id, 'day_of_week' => $weekDay, 'start_time' => '14:00:00', 'end_time' => '17:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'relax')->first()->id, 'day_of_week' => $weekDay, 'start_time' => '17:00:00', 'end_time' => '18:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'exercise')->first()->id, 'day_of_week' => $weekDay, 'start_time' => '18:00:00', 'end_time' => '19:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'research')->first()->id, 'day_of_week' => $weekDay, 'start_time' => '19:00:00', 'end_time' => '20:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'wind down')->first()->id, 'day_of_week' => $weekDay, 'start_time' => '20:00:00', 'end_time' => '22:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'sleep')->first()->id, 'day_of_week' => $weekDay, 'start_time' => '22:00:00', 'end_time' => '06:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ];
        }

        foreach ($weekEndDays as $weekEndDay) {
            $schedule[] = [
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'wakeup')->first()->id, 'day_of_week' => $weekEndDay, 'start_time' => '06:00:00', 'end_time' => '06:00:00','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'exercise')->first()->id, 'day_of_week' => $weekEndDay, 'start_time' => '06:00:00', 'end_time' => '07:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'lunch')->first()->id, 'day_of_week' => $weekEndDay, 'start_time' => '13:00:00', 'end_time' => '14:00:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['user_id' => 1, 'activity_type_id' => $activityTypes->where('title', 'sleep')->first()->id, 'day_of_week' => $weekEndDay, 'start_time' => '22:00:00', 'end_time' => '06:00:00','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ];
        }

        foreach ($schedule as $entry) {
            DB::table('calendar_entries')->insert($entry);
        }
    }
}
