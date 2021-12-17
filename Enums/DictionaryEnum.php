<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

final class DictionaryEnum extends Enum
{
    public const GROUP_ADVERTISEMENT = 'advertisement';

    public static array $attr = [
        'group' => [
            self::GROUP_ADVERTISEMENT => '广告',
        ]
    ];
}
