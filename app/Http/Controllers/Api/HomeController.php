<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WeightTracking;
use Illuminate\Http\JsonResponse;

/**
 * Class HomeController
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $weightData = WeightTracking::where('user_id', auth()->id())->orderBy('created_at')->take(8)->get();
        return response()->json($weightData);
    }
}
