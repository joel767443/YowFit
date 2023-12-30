<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\WeightTracking;
use Illuminate\Contracts\View\View;

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
        $weightData = WeightTracking::where('user_id', auth()->id())->orderBy('recorded_at')->take(8)->get();
        return view('admin.weight-tracking.show', compact('weightData'));
    }
}
