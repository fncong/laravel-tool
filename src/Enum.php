<?php

namespace Tool;

use ReflectionClass;
use ReflectionException;

abstract class Enum
{
    protected static array $cache = [];

    public static function toArray()
    {
        $class = static::class;

        if (!isset(static::$cache[$class])) {
            $reflection = new ReflectionClass($class);
            static::$cache[$class] = $reflection->getConstants();
        }

        return static::$cache[$class];
    }

    public function values(): array
    {
        return static::toArray();
    }

    public function keys(): array
    {
        return array_keys(static::toArray());
    }

    abstract public function labels(): array;
}
