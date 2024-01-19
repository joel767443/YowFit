<?php

namespace App\Repositories;

use App\Models\Exercise;
use App\Repositories\Contracts\ExerciseRepositoryInterface;

class ExerciseRepository extends BaseRepository implements ExerciseRepositoryInterface
{
    /**
     * @param Exercise $exercise
     */
    public function __construct(Exercise $exercise)
    {
        parent::__construct($exercise);
        $this->model = $exercise;
    }
}
