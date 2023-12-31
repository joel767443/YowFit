<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExerciseCreateRequest;
use App\Http\Requests\ExerciseUpdateRequest;
use App\Models\Exercise;
use App\Models\ExerciseType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ExerciseController
 */
class ExerciseController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $exercises = Exercise::search($request->input('search'))->paginate(env('PER_PAGE'));
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
            'exerciseTypes' => ExerciseType::all(),
        ]);
    }

    /**
     * @return View
     */
    public function create(): view
    {
        return view('admin.exercise.create', ['exerciseTypes' => ExerciseType::all()]);
    }

    /**
     * @param ExerciseCreateRequest $request
     * @return RedirectResponse
     */
    public function store(ExerciseCreateRequest $request): RedirectResponse
    {
        Exercise::create($request->validated());
        return redirect('exercises')->with('success', 'Exercise stored.');
    }

    /**
     * @param ExerciseUpdateRequest $request
     * @param Exercise $exercise
     * @return RedirectResponse
     */
    public function update(ExerciseUpdateRequest $request, Exercise $exercise): RedirectResponse
    {
        $exercise->update($request->validated());
        return redirect("exercises/$exercise->id");
    }
}
