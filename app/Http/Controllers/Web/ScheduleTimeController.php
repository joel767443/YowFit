<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleTimeRequest;
use App\Models\ScheduleTime;
use Illuminate\Http\JsonResponse;

/**
 * Class ScheduleTimeController
 */
class ScheduleTimeController extends Controller
{
    /**
     * @param ScheduleTimeRequest $request
     * @return JsonResponse
     */
    public function store(ScheduleTimeRequest $request): JsonResponse
    {
        $exerciseTime = ScheduleTime::create($request->validated());
        return response()->json([
            'status' => true,
            'exerciseTime' => [
                'id' => $exerciseTime->id,
                'start_time' => $exerciseTime->start_time,
                'end_time' => $exerciseTime->end_time,
                'exercise' => $exerciseTime->exercise->name,
            ]
        ]);
    }
}
