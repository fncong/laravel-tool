<?php

namespace Tool\Interfaces;

interface ValidateInterface
{
    public function rules(): array;


    public function scenes($scene);


    public function messages(): array;


    public function attributes(): array;
}