<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class ScheduleController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $schedules = Schedule::all();
        return response()->json($schedules, Response::HTTP_OK);
    }

    /**
     * @param CreateScheduleRequest $request
     * @return JsonResponse
     */
    public function store(CreateScheduleRequest $request): JsonResponse
    {
        $schedule = Schedule::create($request->validated());
        return response()->json($schedule, Response::HTTP_CREATED);
    }

    /**
     * @param Schedule $schedule
     * @return JsonResponse
     */
    public function show(Schedule $schedule): JsonResponse
    {
        return response()->json($schedule, Response::HTTP_OK);
    }

    /**
     * @param UpdateScheduleRequest $request
     * @param Schedule $schedule
     * @return JsonResponse
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule): JsonResponse
    {
        $schedule->update($request->validated());
        return response()->json($schedule, Response::HTTP_OK);
    }

    /**
     * @param Schedule $schedule
     * @return JsonResponse
     */
    public function destroy(Schedule $schedule): JsonResponse
    {
        $schedule->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
