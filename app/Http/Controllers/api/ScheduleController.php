<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class ScheduleController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function schedule(): JsonResponse
    {
        return response()->json([
            'id' => 1,
            'schedules' => auth()->user()->todaySchedules(),
            'name' => 'meal',
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now(),
        ]);
    }
}
