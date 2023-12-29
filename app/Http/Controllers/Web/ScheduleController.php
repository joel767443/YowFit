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
        $dayOfWeek = Carbon::now()->format('l');
        $schedule = Schedule::getFullSchedule(auth()->id(), $dayOfWeek);
        return view('schedule.index', compact('dayOfWeek', 'schedule'));
    }
}
