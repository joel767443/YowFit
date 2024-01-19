<?php

namespace App\Repositories;

use App\Models\ExerciseType;
use App\Repositories\Contracts\ExerciseTypeRepositoryInterface;

/**
 * Class ExerciseTypeRepository
 */
class ExerciseTypeRepository extends BaseRepository implements ExerciseTypeRepositoryInterface
{
    /**
     * @param ExerciseType $exerciseType
     */
    public function __construct(ExerciseType $exerciseType)
    {
        parent::__construct($exerciseType);
        $this->model = $exerciseType;
    }
}
