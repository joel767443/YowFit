<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMealRequest;
use App\Http\Requests\MealUpdateRequest;
use App\Models\Meal;
use App\Models\MealType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class MealController
 */
class MealController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $meals = Meal::search($request->input('search'))->paginate(env('PER_PAGE'));
        return view('admin.meal.index', compact('meals'));
    }

    /**
     * @param Meal $meal
     * @return View
     */
    public function show(Meal $meal): View
    {
        return view('admin.meal.show', [
            'meal' => $meal,
        ]);
    }

    /**
     * @param Meal $meal
     * @return View
     */
    public function edit(Meal $meal): View
    {
        return view('admin.meal.edit', [
            'meal' => $meal,
            'mealTypes' => MealType::all(),
        ]);
    }

    /**
     * @return View
     */
    public function create(): view
    {
        return view('admin.meal.create', ['mealTypes' => MealType::all()]);
    }

    /**
     * @param CreateMealRequest $request
     * @return RedirectResponse
     */
    public function store(CreateMealRequest $request): RedirectResponse
    {
        Meal::create($request->validated());
        return redirect('meals')->with('success', 'test');
    }

    /**
     * @param MealUpdateRequest $request
     * @param Meal $meal
     * @return RedirectResponse
     */
    public function update(MealUpdateRequest $request, Meal $meal): RedirectResponse
    {
        $meal->update($request->validated());
        return redirect("meals/$meal->id");
    }
}
