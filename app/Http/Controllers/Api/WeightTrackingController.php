<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeightLogCreateRequest;
use App\Repositories\Contracts\WeightTrackingRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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
     * @return JsonResponse
     */
    public function show(): JsonResponse
    {
        $weightData = $this->weightTrackingRepository->getWeightData();
        return response()->json($weightData);
    }

    /**
     * @param WeightLogCreateRequest $request
     * @return JsonResponse
     */
    public function store(WeightLogCreateRequest $request): JsonResponse
    {
        return response()->json(
            $this->weightTrackingRepository->create($request->validated())
        );
    }
}
