<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateWeightTrackingRequest;
use App\Http\Requests\UpdateWeightTrackingRequest;
use App\Models\WeightTracking;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class WeightTrackingController extends Controller
{
    public function index(): JsonResponse
    {
        $weightTracking = WeightTracking::all();
        return response()->json($weightTracking, Response::HTTP_OK);
    }

    public function store(CreateWeightTrackingRequest $request): JsonResponse
    {
        $weightTracking = WeightTracking::create($request->validated());
        return response()->json($weightTracking, Response::HTTP_CREATED);
    }

    public function show(WeightTracking $weightTracking): JsonResponse
    {
        return response()->json($weightTracking, Response::HTTP_OK);
    }

    public function update(UpdateWeightTrackingRequest $request, WeightTracking $weightTracking): JsonResponse
    {
        $weightTracking->update($request->validated());
        return response()->json($weightTracking, Response::HTTP_OK);
    }

    public function destroy(WeightTracking $weightTracking): JsonResponse
    {
        $weightTracking->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
