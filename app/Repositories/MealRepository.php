<?php

namespace App\Repositories;

use App\Models\Meal;

/**
 * Class UserRepository
 */
class MealRepository extends BaseRepository
{
    /**
     * @param Meal $meal
     */
    public function __construct(Meal $meal)
    {
        $this->model = $meal;
    }
}
