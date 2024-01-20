<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExerciseTimeRequest;
use App\Models\ExerciseTime;
use Illuminate\Http\JsonResponse;

/**
 * Class ExerciseTimeController
 */
class ExerciseTimeController extends Controller
{
    /**
     * @param ExerciseTimeRequest $request
     * @return JsonResponse
     */
    public function store(ExerciseTimeRequest $request): JsonResponse
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
