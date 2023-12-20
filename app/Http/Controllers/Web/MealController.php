<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Models\Meal;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class MealController
 */
class MealController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.meal.index', ['meals' => Meal::all()]);
    }

    /**
     * @param CreateMealRequest $request
     * @return RedirectResponse
     */
    public function store(CreateMealRequest $request): RedirectResponse
    {
        Meal::create($request->validated());
        return redirect('meals');
    }

    /**
     * @param Meal $meal
     * @return View
     */
    public function show(Meal $meal): view
    {
        return view('admin.meal.show', ['meal' => $meal]);
    }

    /**
     * @param Meal $meal
     * @return View
     */
    public function edit(Meal $meal): view
    {
        return view('admin.meal.edit', ['meal' => $meal]);
    }

    /**
     * @return View
     */
    public function create(): view
    {
        return view('admin.meal.create');
    }

    /**
     * @param UpdateMealRequest $request
     * @param Meal $meal
     * @return RedirectResponse
     */
    public function update(UpdateMealRequest $request, Meal $meal): RedirectResponse
    {
        $meal->update($request->validated());
        return redirect("meals/$meal->id");
    }

    /**
     * @param Meal $meal
     * @return RedirectResponse
     */
    public function destroy(Meal $meal): RedirectResponse
    {
        $meal->delete();
        return redirect('meals');
    }
}
