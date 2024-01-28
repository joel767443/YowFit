<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ScheduleRepositoryInterface;

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
}
