<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class ScheduleSeeder
 */
class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daysOfTheWeek = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday',
        ];

        // Seed schedules for each day of the week
        foreach ($daysOfTheWeek as $day) {
            $schedule = new Schedule([
                'user_id' => User::where('email', 'admin@example.com')->first()->id,
                'day_of_week' => $day,
                'wakeup_time' => '06:00:00',
                'sleeping_time' => '22:00:00',
            ]);

            $schedule->save();
        }
    }
}
