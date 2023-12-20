<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;
use App\Models\Exercise;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 *
 */
class ExerciseController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.exercise.index', ['exercises' => Exercise::all()]);
    }

    /**
     * @param CreateExerciseRequest $request
     * @return RedirectResponse
     */
    public function store(CreateExerciseRequest $request): RedirectResponse
    {
        Exercise::create($request->validated());
        return redirect('exercises');
    }

    /**
     * @param Exercise $exercise
     * @return View
     */
    public function show(Exercise $exercise): view
    {
        return view('admin.exercise.show', ['exercise' => $exercise]);
    }

    /**
     * @param Exercise $exercise
     * @return View
     */
    public function edit(Exercise $exercise): view
    {
        return view('admin.exercise.edit', ['exercise' => $exercise]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.exercise.create');
    }

    /**
     * @param UpdateExerciseRequest $request
     * @param Exercise $exercise
     * @return RedirectResponse
     */
    public function update(UpdateExerciseRequest $request, Exercise $exercise): RedirectResponse
    {
        $exercise->update($request->validated());
        return redirect("exercises/$exercise->id");
    }

    /**
     * @param Exercise $exercise
     * @return RedirectResponse
     */
    public function destroy(Exercise $exercise): RedirectResponse
    {
        $exercise->delete();
        return redirect('exercises');
    }
}
