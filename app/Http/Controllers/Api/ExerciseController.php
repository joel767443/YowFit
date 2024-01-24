<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FormatAPIResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExerciseRequest;
use App\Models\Exercise;
use App\Repositories\Contracts\ExerciseRepositoryInterface;
use App\Repositories\Contracts\ExerciseTypeRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ExerciseController
 * @property ExerciseRepositoryInterface $exerciseRepository
 * @property ExerciseTypeRepositoryInterface $exerciseTypeRepository
 */
class ExerciseController extends Controller
{
    /**
     * ExerciseController constructor.
     *
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
        return FormatAPIResponse::format(
            $this->exerciseRepository->getAll($request), $request
        );
    }

    /**
     * @param Exercise $exercise
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Exercise $exercise, Request $request): JsonResponse
    {
        return FormatAPIResponse::format($exercise, $request);
    }

    /**
     * @param ExerciseRequest $request
     * @return JsonResponse
     */
    public function store(ExerciseRequest $request): JsonResponse
    {
        try {
            return FormatAPIResponse::format(
                $this->exerciseRepository->create($request->validated()), $request
            );
        } catch (Exception $e) {
            return FormatAPIResponse::formatException($e->getMessage());
        }
    }

    /**
     * @param ExerciseRequest $request
     * @param Exercise $exercise
     * @return JsonResponse
     */
    public function update(ExerciseRequest $request, Exercise $exercise): JsonResponse
    {
        try {
            return FormatAPIResponse::format(
                $this->exerciseRepository->update($exercise, $request->validated()), $request
            );
        } catch (Exception $e) {
            return FormatAPIResponse::formatException($e->getMessage());
        }
    }
}
