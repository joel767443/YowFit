<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExerciseTimeCreateRequest;
use App\Models\ExerciseTime;
use Illuminate\Http\JsonResponse;

/**
 * Class ExerciseTimeController
 */
class ExerciseTimeController extends Controller
{
    /**
     * @param ExerciseTimeCreateRequest $request
     * @return JsonResponse
     */
    public function store(ExerciseTimeCreateRequest $request): JsonResponse
    {
        $exerciseTime = ExerciseTime::create($request->validated());
        return response()->json([
            'status' => true,
            'exerciseTime' => [
                'id' => $exerciseTime->id,
                'exercise_time_from' => $exerciseTime->exercise_time_from,
                'exercise_time_to' => $exerciseTime->exercise_time_to,
                'exercise' => $exerciseTime->exercise->name,
            ]
        ], 200);
    }
}
