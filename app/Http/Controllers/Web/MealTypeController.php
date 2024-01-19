<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMealTypeRequest;
use App\Http\Requests\MealTypeUpdateRequest;
use App\Models\MealType;
use App\Repositories\Contracts\MealTypeRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * @property MealTypeRepositoryInterface $mealTypeRepository
 */
class MealTypeController extends Controller
{
    /**
     * @param MealTypeRepositoryInterface $mealTypeRepository
     */
    public function __construct(MealTypeRepositoryInterface $mealTypeRepository)
    {
        $this->mealTypeRepository = $mealTypeRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $mealTypes = $this->mealTypeRepository->getAll($request);
        return view('admin.mealType.index', compact('mealTypes'));
    }

    /**
     * @param MealType $mealType
     * @return View
     */
    public function show(MealType $mealType): View
    {
        return view('admin.mealType.show', compact('mealType'));
    }

    /**
     * @param MealType $mealType
     * @return View
     */
    public function edit(MealType $mealType): View
    {
        return view('admin.mealType.edit', [
            'mealType' => $mealType,
        ]);
    }

    /**
     * @return View
     */
    public function create(): view
    {
        return view('admin.mealType.create');
    }

    /**
     * @param CreateMealTypeRequest $request
     * @return RedirectResponse
     */
    public function store(CreateMealTypeRequest $request): RedirectResponse
    {
        $this->mealTypeRepository->create($request->validated());
        return redirect('mealTypes')->with('success', 'MealType created successfully.');
    }

    /**
     * @param MealTypeUpdateRequest $request
     * @param MealType $mealType
     * @return RedirectResponse
     */
    public function update(MealTypeUpdateRequest $request, MealType $mealType): RedirectResponse
    {
        $this->mealTypeRepository->update($mealType, $request->validated());
        return redirect("mealTypes/$mealType->id");
    }
}
