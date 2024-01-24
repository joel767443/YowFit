<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FormatAPIResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Exception;

abstract class BaseApiController extends Controller
{
    /**
     * @var Model
     */
    protected Model $repository;

    /**
     * BaseApiController constructor.
     *
     * @param Model $repository
     */
    public function __construct(Model $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all resources.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $resources = $this->repository->getAll($request);
            return FormatAPIResponse::format($resources, $request);
        } catch (Exception $e) {
            return FormatAPIResponse::formatException($e->getMessage());
        }
    }

    /**
     * Get a single resource by ID.
     *
     * @param Model $resource
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Model $resource, Request $request): JsonResponse
    {
        return FormatAPIResponse::format($resource, $request);
    }

    /**
     * Create a new resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validatedData = $this->validateRequest($request);
            $createdResource = $this->repository->create($validatedData);
            return FormatAPIResponse::format($createdResource, $request);
        } catch (ValidationException $e) {
            return FormatAPIResponse::formatValidationErrors($e->validator->errors()->toArray());
        } catch (Exception $e) {
            return FormatAPIResponse::formatException($e->getMessage());
        }
    }

    /**
     * Update an existing resource.
     *
     * @param Model $resource
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Model $resource, Request $request): JsonResponse
    {
        try {
            $validatedData = $this->validateRequest($request);
            $updatedResource = $this->repository->update($resource, $validatedData);
            return FormatAPIResponse::format($updatedResource, $request);
        } catch (ValidationException $e) {
            return FormatAPIResponse::formatValidationErrors($e->validator->errors()->toArray());
        } catch (Exception $e) {
            return FormatAPIResponse::formatException($e->getMessage());
        }
    }

    /**
     * Validate the request.
     *
     * @param Request $request
     * @return array
     * @throws ValidationException
     */
    protected function validateRequest(Request $request): array
    {
        $validatedData = Validator::make($request->all(), $this->getValidationRules())->validate();
        return $validatedData;
    }

    /**
     * Get validation rules for the request.
     *
     * @return array
     */
    abstract protected function getValidationRules(): array;
}
