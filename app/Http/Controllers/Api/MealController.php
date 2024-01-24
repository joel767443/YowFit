<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MealRequest;
use App\Models\Meal;
use App\Repositories\Contracts\MealRepositoryInterface;
use App\Repositories\Contracts\MealTypeRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class MealController
 */
class MealController extends Controller
{
    /**
     * @var $mealRepository MealRepositoryInterface
     */
    protected MealRepositoryInterface $mealRepository;
    /** @var $mealTypeRepository MealTypeRepositoryInterface  */
    protected MealTypeRepositoryInterface $mealTypeRepository;

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
        $meals = $this->mealRepository->getAll($request);
        return response()->json([
            $meals
        ]);
    }

    /**
     * @param Meal $meal
     * @return JsonResponse
     */
    public function show(Meal $meal): JsonResponse
    {
        return response()->json($meal);
    }

    /**
     * @param MealRequest $request
     * @return JsonResponse
     */
    public function store(MealRequest $request): JsonResponse
    {
        return response()->json($this->mealRepository->create($request->validated()));
    }

    /**
     * @param MealRequest $request
     * @param Meal $meal
     * @return JsonResponse
     */
    public function update(MealRequest $request, Meal $meal): JsonResponse
    {
        return response()->json($this->mealRepository->update($meal, $request->validated()));
    }
}
