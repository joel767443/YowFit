<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExerciseRequest;
use App\Http\Requests\ExerciseRequest;
use App\Models\Exercise;
use App\Repositories\Contracts\ExerciseRepositoryInterface;
use App\Repositories\Contracts\ExerciseTypeRepositoryInterface;
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
     * @return View
     */
    public function index(Request $request): View
    {
        $exercises = $this->exerciseRepository->getAll($request);
        return view('admin.exercise.index', compact('exercises'));
    }

    /**
     * @param Exercise $exercise
     * @return View
     */
    public function show(Exercise $exercise): View
    {
        return view('admin.exercise.show', [
            'exercise' => $exercise,
        ]);
    }

    /**
     * @param Exercise $exercise
     * @return View
     */
    public function edit(Exercise $exercise): View
    {
        return view('admin.exercise.edit', [
            'exercise' => $exercise,
            'exerciseTypes' => $this->exerciseTypeRepository->getAll(),
        ]);
    }

    /**
     * @return View
     */
    public function create(): view
    {
        return view('admin.exercise.create', [
            'exerciseTypes' => $this->exerciseTypeRepository->getAll()
        ]);
    }

    /**
     * @param ExerciseRequest $request
     * @return RedirectResponse
     */
    public function store(ExerciseRequest $request): RedirectResponse
    {
        $this->exerciseRepository->create($request->validated());
        return redirect('exercises')->with('success', 'Exercise stored.');
    }

    /**
     * @param ExerciseRequest $request
     * @param Exercise $exercise
     * @return RedirectResponse
     */
    public function update(ExerciseRequest $request, Exercise $exercise): RedirectResponse
    {
        $this->exerciseRepository->update($exercise, $request->validated());
        return redirect("exercises/$exercise->id");
    }
}
