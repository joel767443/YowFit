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
        $result = [];

        $data = [
            $schedule->wakeup_time => 'wakeup time',
            $schedule->sleeping_time => 'time to sleep',
        ];

        foreach ($schedule->exerciseTimes as $exerciseTime) {
            $data[$exerciseTime->time] = "Exercise - " . $exerciseTime->exercise->name . " (" . $exerciseTime->exercise->description . ")";

        }

        foreach ($schedule->eatingTimes as $exerciseTime) {
            $data[$exerciseTime->time] = "Meal - " . $exerciseTime->meal->name . " (" . $exerciseTime->meal->description . ")";
        }

        foreach ($schedule->relaxationTimes as $relaxationTime) {
            $data[$relaxationTime->time] = "Relax - " . $relaxationTime->description;
        }

        ksort($data);

        foreach ($data as $time => $activity) {
            $result[$time] = $activity;
        }

        return $result;
    }
}
