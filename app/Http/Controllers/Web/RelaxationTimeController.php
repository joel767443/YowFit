<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\RelaxationTimeRequest;
use App\Models\RelaxationTime;
use App\Repositories\Contracts\RelaxationTimeRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class RelaxationTimeController
 */
class RelaxationTimeController extends Controller
{
    /**
     * @var RelaxationTimeRepositoryInterface
     */
    protected RelaxationTimeRepositoryInterface $relaxationTimeRepository;

    /**
     * @param RelaxationTimeRepositoryInterface $relaxationTimeRepository
     */
    public function __construct(RelaxationTimeRepositoryInterface $relaxationTimeRepository)
    {
        $this->relaxationTimeRepository = $relaxationTimeRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $relaxationTimes = $this->relaxationTimeRepository->getAll($request);
        return view('admin.relaxationTime.index', compact('relaxationTimes'));
    }

    /**
     * @param RelaxationTime $relaxationTime
     * @return View
     */
    public function show(RelaxationTime $relaxationTime): View
    {
        return view('admin.relaxationTime.show', compact('relaxationTime'));
    }

    /**
     * @param RelaxationTime $relaxationTime
     * @return View
     */
    public function edit(RelaxationTime $relaxationTime): View
    {
        return view('admin.relaxationTime.edit', [
            'relaxationTime' => $relaxationTime,
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.relaxationTime.create');
    }

    /**
     * @param RelaxationTimeRequest $request
     * @return RedirectResponse
     */
    public function store(RelaxationTimeRequest $request): RedirectResponse
    {
        $this->relaxationTimeRepository->create($request->validated());
        return redirect()->route('relaxationTimes.index')->with('success', 'RelaxationTime created successfully.');
    }

    /**
     * @param RelaxationTimeRequest $request
     * @param RelaxationTime $relaxationTime
     * @return RedirectResponse
     */
    public function update(RelaxationTimeRequest $request, RelaxationTime $relaxationTime): RedirectResponse
    {
        $this->relaxationTimeRepository->update($relaxationTime, $request->validated());
        return redirect()->route('relaxationTimes.show', ['relaxationTime' => $relaxationTime->id]);
    }
}
