<?php

namespace App\Services;

/**
 * class ScheduleService
 */
class ScheduleService
{

    /**
     * @param $schedule
     * @return array
     */
    public static function formatScheduleData($schedule): array
    {
        $data = [
            $schedule->wakeup_time => 'wakeup time',
            $schedule->sleeping_time => 'time to sleep',
        ];

        foreach ($schedule->scheduleTimes as $exerciseTime) {
            $activity = $exerciseTime->scheduleable->name . " (" . $exerciseTime->scheduleable->description . ")";
            $data[$exerciseTime->start_time] = $activity;
        }

        ksort($data);
        return $data;
    }
}
