<?php

namespace App\Repositories\Contracts;

/**
 * Class WeightTrackingRepositoryInterface
 */
interface WeightTrackingRepositoryInterface extends BaseRepositoryInterface
{

    public function getWeightData();
}
