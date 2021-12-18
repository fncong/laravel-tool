<?php


namespace Tool\Exceptions;


use Illuminate\Http\JsonResponse;

class ValidatorException extends \RuntimeException
{
    public function render($request): JsonResponse
    {
        return response()->json(['code' => 0, 'message' => $this->getMessage(), 'data' => []], 412);
    }
}
