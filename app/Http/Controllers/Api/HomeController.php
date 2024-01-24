<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\WeightTrackingRepositoryInterface;
use Illuminate\Http\JsonResponse;

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
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $weightData = $this->weightTrackingRepository->getWeightData();
        return response()->json($weightData);
    }
}
