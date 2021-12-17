<?php

namespace Tool\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class ValidatorSceneNotFoundExException extends Exception
{
    public function render($request): JsonResponse
    {
//        return failure($this->getMessage())->setStatusCode(503);
    }
}
