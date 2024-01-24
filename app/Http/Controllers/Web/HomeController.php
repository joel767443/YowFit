<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\WeightTrackingRepositoryInterface;
use Illuminate\Contracts\Support\Renderable;

/**
 * Class HomeController
 * @property WeightTrackingRepositoryInterface $weightTrackingRepository
 */
class HomeController extends Controller
{
    /**
     * ScheduleController constructor.
     *
     * @param WeightTrackingRepositoryInterface $weightTrackingRepository
     */
    public function __construct(WeightTrackingRepositoryInterface $weightTrackingRepository)
    {
        $this->weightTrackingRepository = $weightTrackingRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $weightData = $this->weightTrackingRepository->getWeightData();
        return view('home', compact('weightData'));
    }
}
