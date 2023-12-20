<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Models\Meal;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class ApiMealController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $meals = Meal::all();
        return response()->json($meals, Response::HTTP_OK);
    }

    /**
     * @param CreateMealRequest $request
     * @return JsonResponse
     */
    public function store(CreateMealRequest $request): JsonResponse
    {
        $meal = Meal::create($request->validated());
        return response()->json($meal, Response::HTTP_CREATED);
    }

    /**
     * @param Meal $meal
     * @return JsonResponse
     */
    public function show(Meal $meal): JsonResponse
    {
        return response()->json($meal, Response::HTTP_OK);
    }

    /**
     * @param UpdateMealRequest $request
     * @param Meal $meal
     * @return JsonResponse
     */
    public function update(UpdateMealRequest $request, Meal $meal): JsonResponse
    {
        $meal->update($request->validated());
        return response()->json($meal, Response::HTTP_OK);
    }

    /**
     * @param Meal $meal
     * @return JsonResponse
     */
    public function destroy(Meal $meal): JsonResponse
    {
        $meal->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
