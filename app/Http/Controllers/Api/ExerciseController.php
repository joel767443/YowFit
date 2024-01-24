<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExerciseRequest;
use App\Models\Exercise;
use App\Repositories\Contracts\ExerciseRepositoryInterface;
use App\Repositories\Contracts\ExerciseTypeRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ExerciseController
 * @property ExerciseRepositoryInterface $exerciseRepository
 * @property ExerciseTypeRepositoryInterface $exerciseTypeRepository
 */
class ExerciseController extends Controller
{
    /**
     * @param ExerciseRepositoryInterface $exerciseRepository
     * @param ExerciseTypeRepositoryInterface $exerciseTypeRepository
     */
    public function __construct(
        ExerciseRepositoryInterface $exerciseRepository,
        ExerciseTypeRepositoryInterface $exerciseTypeRepository
    )
    {
        $this->exerciseRepository = $exerciseRepository;
        $this->exerciseTypeRepository = $exerciseTypeRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json($this->exerciseRepository->getAll($request));
    }

    /**
     * @param Exercise $exercise
     * @return JsonResponse
     */
    public function show(Exercise $exercise): JsonResponse
    {
        try {
            Exercise::where('id', $exercise);
//            return response()->json($exercise);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * @param ExerciseRequest $request
     * @return JsonResponse
     */
    public function store(ExerciseRequest $request): JsonResponse
    {
        return response()->json($this->exerciseRepository->create($request->validated()));
    }

    /**
     * @param ExerciseRequest $request
     * @param Exercise $exercise
     * @return JsonResponse
     */
    public function update(ExerciseRequest $request, Exercise $exercise): JsonResponse
    {
        return response()->json($this->exerciseRepository->update($exercise, $request->validated()));
    }
}
