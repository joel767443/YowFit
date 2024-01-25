<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ScheduleRepositoryInterface;
use App\Services\ScheduleService;
use Carbon\Carbon;
use Illuminate\View\View;

/**
 * Class ScheduleController
 */
class ScheduleController extends Controller
{
    /**
     * @var ScheduleRepositoryInterface
     */
    protected ScheduleRepositoryInterface $scheduleRepository;

    /**
     * @param ScheduleRepositoryInterface $scheduleRepository
     */
    public function __construct(ScheduleRepositoryInterface $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    /**
     * Display the schedule for a specific day.
     *
     * @return View
     */
    public function show(): View
    {
        $currentDayOfWeek = Carbon::now()->format('l');
        $schedule = $this->scheduleRepository->getTodayScheduleForUser(auth()->id(), $currentDayOfWeek);
        $result = ScheduleService::formatScheduleData($schedule);

        return view('admin.schedule.index', compact('currentDayOfWeek', 'result', 'schedule'));
    }
}
