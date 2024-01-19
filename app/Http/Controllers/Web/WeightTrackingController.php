<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeightLogCreateRequest;
use App\Repositories\Contracts\WeightTrackingRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class WeightTrackingController
 */
class WeightTrackingController extends Controller
{
    /**
     * @var WeightTrackingRepositoryInterface
     */
    private WeightTrackingRepositoryInterface $weightTrackingRepository;

    /**
     * @param WeightTrackingRepositoryInterface $weightTrackingRepository
     */
    public function __construct(WeightTrackingRepositoryInterface $weightTrackingRepository)
    {
        $this->weightTrackingRepository = $weightTrackingRepository;
    }

    /**
     * @return View
     */
    public function show(): View
    {
        $weightData = $this->weightTrackingRepository->getWeightData();
        return view('admin.weight-tracking.show', compact('weightData'));
    }

    /**
     * @return View
     */
    public function log(): view
    {
        return view('admin.weight-tracking.log', ['user' => Auth::user()]);
    }

    /**
     * @param WeightLogCreateRequest $request
     * @return RedirectResponse
     */
    public function store(WeightLogCreateRequest $request): RedirectResponse
    {
        $this->weightTrackingRepository->create($request->validated());
        return redirect('weight-tracking')->with('success', 'Log added successfully.');
    }
}
