<?php

namespace App\Repositories;

use App\Models\Meal;
use App\Repositories\Contracts\MealRepositoryInterface;

/**
 * Class UserRepository
 */
class MealRepository extends BaseRepository implements MealRepositoryInterface
{
    /**
     * @param Meal $meal
     */
    public function __construct(Meal $meal)
    {
        parent::__construct($meal);
        $this->model = $meal;
    }
}
