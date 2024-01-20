<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MealRequest;
use App\Http\Requests\MealRequest;
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
     * @param MealRequest $request
     * @return JsonResponse
     */
    public function store(MealRequest $request): JsonResponse
    {
        return response()->json(
            MealRepository::create($request)
        );
    }

    /**
     * @param MealRequest $request
     * @param Meal $meal
     * @return JsonResponse
     */
    public function update(MealRequest $request, Meal $meal): JsonResponse
    {
        return response()->json(
            MealRepository::update($request, $meal)
        );
    }
}
