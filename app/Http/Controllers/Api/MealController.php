<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FormatAPIResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\MealRequest;
use App\Models\Meal;
use App\Repositories\Contracts\MealRepositoryInterface;
use App\Repositories\Contracts\MealTypeRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class MealController
 * @property MealRepositoryInterface $mealRepository
 * @property MealTypeRepositoryInterface $mealTypeRepository
 */
class MealController extends Controller
{
    /**
     * @param MealRepositoryInterface $mealRepository
     * @param MealTypeRepositoryInterface $mealTypeRepository
     */
    public function __construct(MealRepositoryInterface $mealRepository, MealTypeRepositoryInterface $mealTypeRepository)
    {
        $this->mealRepository = $mealRepository;
        $this->mealTypeRepository = $mealTypeRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return FormatAPIResponse::format(
            $this->mealRepository->getAll($request), $request
        );
    }

    /**
     * @param Meal $meal
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Meal $meal, Request $request): JsonResponse
    {
        return FormatAPIResponse::format($meal, $request);
    }

    /**
     * @param MealRequest $request
     * @return JsonResponse
     */
    public function store(MealRequest $request): JsonResponse
    {
        try {
            return FormatAPIResponse::format(
                $this->mealRepository->create($request->validated()), $request
            );
        } catch (Exception $e) {
            return FormatAPIResponse::formatException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * @param MealRequest $request
     * @param Meal $meal
     * @return JsonResponse
     */
    public function update(MealRequest $request, Meal $meal): JsonResponse
    {
        try {
            return FormatAPIResponse::format(
                $this->mealRepository->update($meal, $request->validated()), $request
            );
        } catch (Exception $e) {
            return FormatAPIResponse::formatException($e->getMessage(), $e->getCode());
        }
    }
}
