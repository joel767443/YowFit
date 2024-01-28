<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\ScheduleTime;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;

/**
 * Class ScheduleTimeController
 */
class ScheduleTimeController extends Controller
{

    /**
     * @return View
     */
    public function mySchedule(): View
    {
        $daysOfTheWeek = Schedule::select('id', 'day_of_week')->where('user_id', Auth()->user()->id)->get();

        $data = $this->formatData();
        return view('admin.schedule.index', compact('data', 'daysOfTheWeek'));
    }

    /**
     * @param Request $request
     * @param ScheduleTime $scheduleTime
     * @return JsonResponse
     */
    public function update(Request $request, ScheduleTime $scheduleTime): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'schedule_id' => 'required|integer',
            'scheduleable_id' => 'required|integer',
            'scheduleable_type' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $scheduleTime->update($request->all());

        return response()->json(['success']);
    }

    /**
     * @return array
     */
    private function formatData(): array
    {
        $result = [];

        $user = Auth::user()->load('schedules.scheduleTimes.scheduleable');

        foreach ($user->schedules as $schedule) {
            $activities = [];

            // Add wakeup time as an activity
            $activities[$schedule->wakeup_time] = [
                'start_time' => Carbon::parse($schedule->wakeup_time)->format('H:i'),
                'end_time' => Carbon::parse($schedule->wakeup_time)->format('H:i'),
                'activity' => 'Wakeup',
            ];

            // Add sleeping time as an activity
            $activities[$schedule->sleeping_time] = [
                'start_time' => Carbon::parse($schedule->sleeping_time)->format('H:i'),
                'end_time' => Carbon::parse($schedule->sleeping_time)->format('H:i'),
                'activity' => 'Sleeping',
            ];

            foreach ($schedule->scheduleTimes as $scheduleTime) {
                $activity = [
                    'start_time' => Carbon::parse($scheduleTime->start_time)->format('H:i'),
                    'end_time' => Carbon::parse($scheduleTime->end_time)->format('H:i'),
                    'activity' => Str::replaceFirst("App\Models\\", "", $scheduleTime->scheduleable_type),
                ];

                $activities[$scheduleTime->start_time] = $activity;
            }

            // Sort activities by start_time
            ksort($activities);

            $result[$schedule->day_of_week]['activities'] = $activities;
            $result[$schedule->day_of_week]['scheduleId'] = $schedule->id;
        }

        return $result;
    }
}
