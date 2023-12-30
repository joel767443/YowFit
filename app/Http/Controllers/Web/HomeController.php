<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\WeightTracking;
use Illuminate\Contracts\Support\Renderable;

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
     * @return Renderable
     */
    public function index(): Renderable
    {
        $weightData = WeightTracking::where('user_id', auth()->id())->orderBy('recorded_at')->take(8)->get();
        return view('home', compact('weightData'));
    }
}
