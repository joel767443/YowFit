<?php

namespace App\Repositories;

use App\Models\WeightTracking;
use App\Repositories\Contracts\WeightTrackingRepositoryInterface;

/**
 * class WeightTrackingRepository
 */
class WeightTrackingRepository extends BaseRepository implements WeightTrackingRepositoryInterface
{
    /**
     * @param WeightTracking $weightTracking
     */
    public function __construct(WeightTracking $weightTracking)
    {
        parent::__construct($weightTracking);
        $this->model = $weightTracking;
    }
}
