<?php


namespace Tool\Exceptions;


use Illuminate\Http\JsonResponse;
use Throwable;

class ServiceException extends \RuntimeException
{
    private $data = [];

    private $service_code = 0;


    public function render($request): JsonResponse
    {
        return response()->json(['code' => $this->service_code, 'message' => $this->getMessage(), 'result' => $this->getData()], 200);
    }

    /**
     * @return int
     */
    public function getServiceCode(): int
    {
        return $this->service_code;
    }

    /**
     * @param int $service_code
     */
    public function setServiceCode(int $service_code): void
    {
        $this->service_code = $service_code;
    }

    public function getData()
    {
        return $this->data;
    }


    public function setData($data): void
    {
        $this->data = $data;
    }
}
