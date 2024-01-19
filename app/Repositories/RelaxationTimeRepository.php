<?php

namespace App\Repositories;

use App\Models\RelaxationTime;
use App\Repositories\Contracts\RelaxationTimeRepositoryInterface;

/**
 * Class RelaxationTimeRepository
 */
class RelaxationTimeRepository extends BaseRepository implements RelaxationTimeRepositoryInterface
{
    /**
     * @param RelaxationTime $relaxationTime
     */
    public function __construct(RelaxationTime $relaxationTime)
    {
        parent::__construct($relaxationTime);
        $this->model = $relaxationTime;
    }
}
