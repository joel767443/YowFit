<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FormatAPIResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\WeightLogCreateRequest;
use App\Repositories\Contracts\WeightTrackingRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class WeightTrackingController
 */
class WeightTrackingController extends Controller
{
    protected WeightTrackingRepositoryInterface $weightTrackingRepository;
    /**
     * WeightTrackingController constructor.
     *
     * @param WeightTrackingRepositoryInterface $weightTrackingRepository
     */
    public function __construct(WeightTrackingRepositoryInterface $weightTrackingRepository)
    {
        $this->weightTrackingRepository = $weightTrackingRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $weightData = $this->weightTrackingRepository->getWeightData();
        return FormatAPIResponse::format($weightData, $request);
    }

    /**
     * @param WeightLogCreateRequest $request
     * @return JsonResponse
     */
    public function store(WeightLogCreateRequest $request): JsonResponse
    {
        try {
            $createdWeightLog = $this->weightTrackingRepository->create($request->validated());
            return FormatAPIResponse::format($createdWeightLog, $request);
        } catch (Exception $e) {
            return FormatAPIResponse::formatException($e->getMessage());
        }
    }
}
