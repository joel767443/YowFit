<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExerciseTypeRequest;
use App\Repositories\Contracts\ExerciseTypeRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class ExerciseTypeController
 * @property ExerciseTypeRepositoryInterface $exerciseTypeRepository
 */
class ExerciseTypeController extends Controller
{
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
     * @param ExerciseTypeRequest $request
     * @return RedirectResponse
     */
    public function store(ExerciseTypeRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $validatedData['slug'] = Str::slug($request->validated('name'));
        $this->exerciseTypeRepository->create($validatedData);
        return redirect('exercise-types')->with('success', 'ExerciseType created successfully.');
    }
}
