<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\Meal;
use App\Models\Rest;
use App\Models\Schedule;
use App\Models\ScheduleTime;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * Class ScheduleTimeSeeder
 */
class ScheduleTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $timeSlots = $this->getTimeSlots();
        $mondayToFridaySchedules = Schedule::all();

        // Loop through each schedule
        foreach ($mondayToFridaySchedules as $schedule) {

            // Add 3 meals
            for ($i = 0; $i < 3; $i++) {
                $meal = Meal::inRandomOrder()->first();
                $timeSlotIndex = array_rand($timeSlots);
                $timeSlot = $timeSlots[$timeSlotIndex];

                $scheduleTime = new ScheduleTime([
                    'start_time' => $timeSlot['start_time'],
                    'end_time' => $timeSlot['end_time'],
                    'schedule_id' => $schedule->id
                ]);

                $meal->scheduleTimes()->save($scheduleTime);
            }

            // Add 2 exercises
            for ($i = 0; $i < 2; $i++) {
                $exercise = Exercise::inRandomOrder()->first();
                $timeSlotIndex = array_rand($timeSlots);
                $timeSlot = $timeSlots[$timeSlotIndex];

                $scheduleTime = new ScheduleTime([
                    'start_time' => $timeSlot['start_time'],
                    'end_time' => $timeSlot['end_time'],
                    'schedule_id' => $schedule->id
                ]);

                $exercise->scheduleTimes()->save($scheduleTime);
            }

            // Add 4 exercises
            for ($i = 0; $i < 4; $i++) {
                $work = Work::inRandomOrder()->first();
                $timeSlotIndex = array_rand($timeSlots);
                $timeSlot = $timeSlots[$timeSlotIndex];

                $scheduleTime = new ScheduleTime([
                    'start_time' => $timeSlot['start_time'],
                    'end_time' => $timeSlot['end_time'],
                    'schedule_id' => $schedule->id
                ]);

                $work->scheduleTimes()->save($scheduleTime);
            }

            // Add 3 rests
            for ($i = 0; $i < 3; $i++) {
                $rest = Rest::inRandomOrder()->first();
                $timeSlotIndex = array_rand($timeSlots);
                $timeSlot = $timeSlots[$timeSlotIndex];

                $scheduleTime = new ScheduleTime([
                    'start_time' => $timeSlot['start_time'],
                    'end_time' => $timeSlot['end_time'],
                    'schedule_id' => $schedule->id
                ]);

                $rest->scheduleTimes()->save($scheduleTime);
            }
        }
    }

    /**
     * @return array
     */
    private function getTimeSlots(): array
    {
        $start = Carbon::parse('6:00 AM');
        $end = Carbon::parse('10:00 PM');

        $timeSlots = [];
        $current = clone $start;

        while ($current <= $end) {
            $startTime = $current->format('H:i:s');
            $current->addMinutes(30);
            $endTime = $current->format('H:i:s');

            $timeSlots[] = ['start_time' => $startTime, 'end_time' => $endTime];
        }

        return $timeSlots;
    }
}
