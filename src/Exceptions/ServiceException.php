<?php


namespace Tool\Exceptions;


class ServiceException extends \Exception
{
    public function getData()
    {
        return $this->data;
    }


    public function setData($data): void
    {
        $this->data = $data;
    }
}
