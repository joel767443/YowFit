<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
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

}
