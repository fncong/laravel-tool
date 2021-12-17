<?php

namespace App\Models\Traits;

use DateTimeInterface;

trait DateTrait
{
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
