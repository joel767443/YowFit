<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMealRequest;
use App\Http\Requests\MealUpdateRequest;
use App\Models\Meal;
use App\Repositories\MealRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class MealController
 */
class MealController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json(MealRepository::fetchAllPaginated($request,true));
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
     * @param CreateMealRequest $request
     * @return JsonResponse
     */
    public function store(CreateMealRequest $request): JsonResponse
    {
        return response()->json(
            MealRepository::create($request)
        );
    }

    /**
     * @param MealUpdateRequest $request
     * @param Meal $meal
     * @return JsonResponse
     */
    public function update(MealUpdateRequest $request, Meal $meal): JsonResponse
    {
        return response()->json(
            MealRepository::update($request, $meal)
        );
    }
}
