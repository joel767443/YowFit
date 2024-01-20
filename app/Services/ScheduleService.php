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
    public static function formatSchedule($schedule): array
    {
        $result = [
            $schedule->wakeup_time => 'wakeup time',
            $schedule->sleeping_time => 'time to sleep',
        ];

        $activityMappings = [
            'exerciseTimes' => ['prefix' => 'Exercise - ', 'property' => 'exercise'],
            'eatingTimes' => ['prefix' => 'Meal - ', 'property' => 'meal'],
            'relaxationTimes' => ['prefix' => 'Relax - ', 'property' => null],
        ];

        foreach ($activityMappings as $activityType => $config) {
            foreach ($schedule->{$activityType} as $activityTime) {
                $prefix = $config['prefix'];
                $property = $config['property'];

                $description = $property ? $activityTime->$property->name . " (" . $activityTime->$property->description . ")" : $activityTime->description;

                $result[$activityTime->time] = $prefix . $description;
            }
        }

        ksort($result);

        return $result;
    }
}
