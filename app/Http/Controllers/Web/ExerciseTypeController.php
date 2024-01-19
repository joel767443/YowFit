<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateExerciseTypeRequest;
use App\Http\Requests\ExerciseTypeUpdateRequest;
use App\Models\ExerciseType;
use App\Repositories\Contracts\ExerciseTypeRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        return view('admin.exerciseType.index', compact('exerciseTypes'));
    }

    /**
     * @param ExerciseType $exerciseType
     * @return View
     */
    public function show(ExerciseType $exerciseType): View
    {
        return view('admin.exerciseType.show', compact('exerciseType'));
    }

    /**
     * @param ExerciseType $exerciseType
     * @return View
     */
    public function edit(ExerciseType $exerciseType): View
    {
        return view('admin.exerciseType.edit', [
            'exerciseType' => $exerciseType,
        ]);
    }

    /**
     * @return View
     */
    public function create(): view
    {
        return view('admin.exerciseType.create');
    }

    /**
     * @param CreateExerciseTypeRequest $request
     * @return RedirectResponse
     */
    public function store(CreateExerciseTypeRequest $request): RedirectResponse
    {
        $this->exerciseTypeRepository->create($request->validated());
        return redirect('exerciseTypes')->with('success', 'ExerciseType created successfully.');
    }

    /**
     * @param ExerciseTypeUpdateRequest $request
     * @param ExerciseType $exerciseType
     * @return RedirectResponse
     */
    public function update(ExerciseTypeUpdateRequest $request, ExerciseType $exerciseType): RedirectResponse
    {
        $this->exerciseTypeRepository->update($exerciseType, $request->validated());
        return redirect("exerciseTypes/$exerciseType->id");
    }
}
