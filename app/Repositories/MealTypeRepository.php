<?php

namespace App\Repositories;

use App\Models\MealType;
use App\Repositories\Contracts\MealTypeRepositoryInterface;

/**
 * Class MealTypeRepository
 */
class MealTypeRepository extends BaseRepository implements MealTypeRepositoryInterface
{
    /**
     * @param MealType $mealType
     */
    public function __construct(MealType $mealType)
    {
        parent::__construct($mealType);
        $this->model = $mealType;
    }
}
