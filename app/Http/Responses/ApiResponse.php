<?php

namespace App\Http\Responses;


use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function return(mixed $result=[], string $message='', bool $success=true): JsonResponse
    {
        return response()
            ->json([
                "result" => $result,
                "message" => $message,
                "success" => $success
            ]);
    }
}
