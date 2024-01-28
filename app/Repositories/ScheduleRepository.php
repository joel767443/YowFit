<?php

namespace App\Repositories;

use App\Models\Schedule;
use App\Repositories\Contracts\ScheduleRepositoryInterface;

/**
 * Class ScheduleRepository
 */
class ScheduleRepository extends BaseRepository implements ScheduleRepositoryInterface
{
    /**
     * @param Schedule $schedule
     */
    public function __construct(Schedule $schedule)
    {
        parent::__construct($schedule);
        $this->model = $schedule;
    }

}
