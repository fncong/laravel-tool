<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

final class ConfigEnum extends Enum
{
    public const GROUP_BASIC = 'basic';

    public static array $attr = [
        'group' => [
            self::GROUP_BASIC => '基础配置',
        ]
    ];
}
