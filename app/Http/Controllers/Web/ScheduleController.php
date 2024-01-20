<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\View\View;

/**
 * Class ScheduleController
 */
class ScheduleController extends Controller
{

    /**
     * Display the schedule for a specific day.
     *
     */
    public function show(): View
    {
        $currentDayOfWeek = Carbon::now()->format('l');
        $schedule = Schedule::getFullSchedule(auth()->id(), $currentDayOfWeek);
        $result = $this->formatSchedule($schedule);

        return view('admin.schedule.index', compact('currentDayOfWeek', 'result', 'schedule'));
    }

    /**
     * @param $schedule
     * @return array
     */
    private function formatSchedule($schedule): array
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
