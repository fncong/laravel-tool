<?php

namespace Tool;

use JetBrains\PhpStorm\Pure;
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

    public static function values(): array
    {
        return static::toArray();
    }

    public static function keys(): array
    {
        return array_keys(static::toArray());
    }

    #[Pure] public static function singleKey($key): array
    {
        return array_keys(static::labels()[$key]);
    }

    public static function labels(): array
    {
        return [];
    }

    #[Pure] public static function getText($key, $value, $default = ''): string
    {
        $data = self::labels();
        if (!isset($data[$key]) || !isset($data[$key][$value])) {
            return $default;
        }
        return $data[$key][$value];
    }
}
