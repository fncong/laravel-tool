<?php


namespace Tool\Exceptions;


use Illuminate\Http\JsonResponse;

class ClassNotFoundException extends \Exception
{
    public function render($request): JsonResponse
    {
//        return failure($this->getMessage())->setStatusCode(503);
    }
}
