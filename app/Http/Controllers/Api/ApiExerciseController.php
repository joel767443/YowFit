<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;
use App\Models\Exercise;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class ApiExerciseController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $exercises = Exercise::all();
        return response()->json($exercises, Response::HTTP_OK);
    }

    /**
     * @param CreateExerciseRequest $request
     * @return JsonResponse
     */
    public function store(CreateExerciseRequest $request): JsonResponse
    {
        $exercise = Exercise::create($request->validated());
        return response()->json($exercise, Response::HTTP_CREATED);
    }

    /**
     * @param Exercise $exercise
     * @return JsonResponse
     */
    public function show(Exercise $exercise): JsonResponse
    {
        return response()->json($exercise, Response::HTTP_OK);
    }

    /**
     * @param UpdateExerciseRequest $request
     * @param Exercise $exercise
     * @return JsonResponse
     */
    public function update(UpdateExerciseRequest $request, Exercise $exercise): JsonResponse
    {
        $exercise->update($request->validated());
        return response()->json($exercise, Response::HTTP_OK);
    }

    /**
     * @param Exercise $exercise
     * @return JsonResponse
     */
    public function destroy(Exercise $exercise): JsonResponse
    {
        $exercise->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
