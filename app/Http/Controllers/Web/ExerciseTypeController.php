<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateExerciseTypeRequest;
use App\Repositories\Contracts\ExerciseTypeRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExerciseTypeController extends Controller
{
    private ExerciseTypeRepositoryInterface $exerciseTypeRepository;

    /**
     * @param ExerciseTypeRepositoryInterface $exerciseTypeRepository
     */
    public function __construct(ExerciseTypeRepositoryInterface $exerciseTypeRepository)
    {
        $this->exerciseTypeRepository = $exerciseTypeRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $exerciseTypes = $this->exerciseTypeRepository->getAll($request);
        return view('admin.exercise-type.index', compact('exerciseTypes'));
    }

    /**
     * @return View
     */
    public function create(): view
    {
        return view('admin.exercise-type.create');
    }

    /**
     * @param CreateExerciseTypeRequest $request
     * @return RedirectResponse
     */
    public function store(CreateExerciseTypeRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $validatedData['slug'] = Str::slug($request->validated('name'));
        $this->exerciseTypeRepository->create($validatedData);
        return redirect('exercise-types')->with('success', 'ExerciseType created successfully.');
    }
}
