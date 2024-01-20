<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Repositories\Contracts\ScheduleRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\UserStatusRepositoryInterface;
use App\Repositories\Contracts\UserTypeRepositoryInterface;
use App\Repositories\ScheduleRepository;
use App\Services\ScheduleService;
use Carbon\Carbon;
use Illuminate\View\View;

/**
 * Class ScheduleController
 * @property ScheduleRepositoryInterface $scheduleRepository
 */
class ScheduleController extends Controller
{
    /**
     * @param ScheduleRepositoryInterface $scheduleRepository
     */
    public function __construct(ScheduleRepositoryInterface $scheduleRepository,)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    /**
     * Display the schedule for a specific day.
     *
     */
    public function show(): View
    {
        $currentDayOfWeek = Carbon::now()->format('l');
        $schedule = $this->scheduleRepository->getFullSchedule(auth()->id(), $currentDayOfWeek);
        $result = ScheduleService::formatSchedule($schedule);
        return view('admin.schedule.index', compact('currentDayOfWeek', 'result', 'schedule'));
    }

}
