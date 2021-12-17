<?php

namespace Tool\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Tool\Exceptions\ClassNotFoundException;
use Tool\Exceptions\ValidatorException;
use Tool\Interfaces\ValidateInterface;

trait ControllerTrait
{
    /**
     * @param $validator
     * @param $data
     * @param string $scene
     * @throws ValidatorException
     * @throws ClassNotFoundException
     */
    public function validator($validator, $data, $scene = ''): void
    {
        if (!class_exists($validator)) {
            throw new ClassNotFoundException('验证器不存在，请检查');
        }
        /** @var ValidatorInterface $validate */
        $validate = new $validator;
        $validator = Validator::make($data, $validate->scenes($scene), $validate->messages(), $validate->attributes());
        if ($validator->fails()) {
            throw new ValidatorException($validator->errors()->first());
        }
    }

    public function success($msg = '', $result = []): JsonResponse
    {
        return response()->json([
            'code' => 0,
            'message' => $msg,
            'result' => $result
        ]);
    }

    public function failure($msg = '', $result = [], $code = 1): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'message' => $msg,
            'data' => $result
        ]);
    }
}
