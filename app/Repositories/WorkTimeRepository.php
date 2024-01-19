<?php

namespace App\Repositories;

use App\Models\WorkTime;
use App\Repositories\Contracts\WorkTimeRepositoryInterface;

/**
 * class WorkTimeRepository
 */
class WorkTimeRepository extends BaseRepository implements WorkTimeRepositoryInterface
{
    /**
     * @param WorkTime $workTime
     */
    public function __construct(WorkTime $workTime)
    {
        parent::__construct($workTime);
        $this->model = $workTime;
    }
}
