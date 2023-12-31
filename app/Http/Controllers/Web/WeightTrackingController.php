<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeightLogCreateRequest;
use App\Models\WeightTracking;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


/**
 * Class WeightTrackingController
 */
class WeightTrackingController extends Controller
{
    /**
     * @return View
     */
    public function show(): View
    {
        $weightData = WeightTracking::where('user_id', auth()->id())
            ->latest('id')
            ->take(8)
            ->get();

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
        WeightTracking::create($request->validated());
        return redirect('weight-tracking')->with('success', 'Log added successfully.');
    }
}
