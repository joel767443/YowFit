<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FormatAPIResponse;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ScheduleRepositoryInterface;
use App\Services\ScheduleService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ScheduleController
 * @property ScheduleRepositoryInterface $scheduleRepository
 */
class ScheduleController extends Controller
{

    /**
     * ScheduleController constructor.
     *
     * @param ScheduleRepositoryInterface $scheduleRepository
     */
    public function __construct(ScheduleRepositoryInterface $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    /**
     * Display the schedule for a specific day.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $currentDayOfWeek = $this->getCurrentDayOfWeek();
        $schedule = $this->scheduleRepository->getTodayScheduleForUser(auth()->id(), $currentDayOfWeek);
        $result = ScheduleService::formatScheduleData($schedule);

        return FormatAPIResponse::format([
            'currentDayOfWeek' => $currentDayOfWeek,
            'result' => $result,
            'schedule' => $schedule,
        ], $request);
    }

    /**
     * Get the current day of the week.
     *
     * @return string
     */
    protected function getCurrentDayOfWeek(): string
    {
        return Carbon::now()->format('l');
    }
}
