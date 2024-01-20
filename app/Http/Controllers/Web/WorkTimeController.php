<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkTimeRequest;
use App\Http\Requests\WorkTimeRequest;
use App\Models\WorkTime;
use App\Repositories\Contracts\WorkTimeRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * @property WorkTimeRepositoryInterface $workTimeRepository
 */
class WorkTimeController extends Controller
{
    /**
     * @param WorkTimeRepositoryInterface $workTimeRepository
     */
    public function __construct(WorkTimeRepositoryInterface $workTimeRepository)
    {
        $this->workTimeRepository = $workTimeRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $workTimes = $this->workTimeRepository->getAll($request);
        return view('admin.workTime.index', compact('workTimes'));
    }

    /**
     * @param WorkTime $workTime
     * @return View
     */
    public function show(WorkTime $workTime): View
    {
        return view('admin.workTime.show', compact('workTime'));
    }

    /**
     * @param WorkTime $workTime
     * @return View
     */
    public function edit(WorkTime $workTime): View
    {
        return view('admin.workTime.edit', [
            'workTime' => $workTime,
        ]);
    }

    /**
     * @return View
     */
    public function create(): view
    {
        return view('admin.workTime.create');
    }

    /**
     * @param WorkTimeRequest $request
     * @return RedirectResponse
     */
    public function store(WorkTimeRequest $request): RedirectResponse
    {
        $this->workTimeRepository->create($request->validated());
        return redirect('workTimes')->with('success', 'WorkTime created successfully.');
    }

    /**
     * @param WorkTimeRequest $request
     * @param WorkTime $workTime
     * @return RedirectResponse
     */
    public function update(WorkTimeRequest $request, WorkTime $workTime): RedirectResponse
    {
        $this->workTimeRepository->update($workTime, $request->validated());
        return redirect("workTimes/$workTime->id");
    }
}
