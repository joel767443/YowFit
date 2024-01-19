<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMealRequest;
use App\Http\Requests\MealUpdateRequest;
use App\Models\Meal;
use App\Repositories\Contracts\MealRepositoryInterface;
use App\Repositories\Contracts\MealTypeRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class MealController
 */
class MealController extends Controller
{
    /**
     * @var $mealRepository MealRepositoryInterface
     */
    protected MealRepositoryInterface $mealRepository;
    /** @var $mealTypeRepository MealTypeRepositoryInterface  */
    protected MealTypeRepositoryInterface $mealTypeRepository;

    /**
     * @param MealRepositoryInterface $mealRepository
     * @param MealTypeRepositoryInterface $mealTypeRepository
     */
    public function __construct(MealRepositoryInterface $mealRepository, MealTypeRepositoryInterface $mealTypeRepository)
    {
        $this->mealRepository = $mealRepository;
        $this->mealTypeRepository = $mealTypeRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $meals = $this->mealRepository->getAll($request);
        return view('admin.meal.index', compact('meals'));
    }

    /**
     * @param Meal $meal
     * @return View
     */
    public function show(Meal $meal): View
    {
        return view('admin.meal.show', compact('meal'));
    }

    /**
     * @param Meal $meal
     * @return View
     */
    public function edit(Meal $meal): View
    {
        return view('admin.meal.edit', [
            'meal' => $meal,
            'mealTypes' => $this->mealTypeRepository->getAll(),
        ]);
    }

    /**
     * @return View
     */
    public function create(): view
    {
        return view('admin.meal.create', ['mealTypes' => $this->mealTypeRepository->getAll()]);
    }

    /**
     * @param CreateMealRequest $request
     * @return RedirectResponse
     */
    public function store(CreateMealRequest $request): RedirectResponse
    {
        $this->mealRepository->create($request->validated());
        return redirect('meals')->with('success', 'Meal created successfully.');
    }

    /**
     * @param MealUpdateRequest $request
     * @param Meal $meal
     * @return RedirectResponse
     */
    public function update(MealUpdateRequest $request, Meal $meal): RedirectResponse
    {
        $this->mealRepository->update($meal, $request->validated());
        return redirect("meals/$meal->id");
    }
}
