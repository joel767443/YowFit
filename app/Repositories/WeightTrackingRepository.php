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

    /**
     * @return mixed
     */
    public function getWeightData(): mixed
    {
        return $this->model::select('id', 'weight', 'created_at')
            ->where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();
    }
}
