<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponse
{
    public function success(string $message = null, array $data = [], int $code = Response::HTTP_OK): JsonResponse
    {
        $response = ['success' => true];

        if ($message) { $response['message'] = $message; }

        $response['data'] = $data;

        return response()->json($response, $code);
    }

    public function successMessage(string $message, int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json(['success' => true, 'message' => $message], $code);
    }
}
