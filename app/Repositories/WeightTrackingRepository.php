<?php

namespace App\Repositories;

use App\Models\WeightTracking;
use App\Repositories\Contracts\WeightTrackingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

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
        return $this->model::where('user_id', auth()->id())
            ->latest('id')
            ->take(8)
            ->get();
    }
}
