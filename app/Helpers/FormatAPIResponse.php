<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class FormatAPIResponse
 */
class FormatAPIResponse
{
    /**
     * @param mixed $data
     * @param Request $request
     * @return JsonResponse
     */
    public static function format(mixed $data, Request $request): JsonResponse
    {
        $status = $request->method() == "POST" || $request->method() == "PUT" ? 201 : 200;

        return response()->json([
            "status" => $status,
            "message" => "Operation successful",
            "data" => $data,
        ], $status);
    }

    /**
     * @param string $message
     * @param $code
     * @return JsonResponse
     */
    public static function formatException(string $message, $code): JsonResponse
    {
        return response()->json([
            "status" => $code,
            "message" => $message,
        ], $code);
    }
}
