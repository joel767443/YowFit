<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ScheduleRepositoryInterface;

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
