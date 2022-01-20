<?php

namespace Tool\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class ValidatorSceneNotFoundExException extends Exception
{
    public function render($request): JsonResponse
    {
        return response()->json(['code' => 1, 'message' => $this->getMessage(), 'result' => []], 500);
    }
}
