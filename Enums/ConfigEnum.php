<?php

namespace App\Enums;


use JetBrains\PhpStorm\ArrayShape;
use Tool\Enum;

final class ConfigEnum extends Enum
{
    public const GROUP_BASIC = 'basic';


    #[ArrayShape(['group' => "string[]"])] public function labels(): array
    {
        return [
            'group' => [
                self::GROUP_BASIC => '基础配置',
            ]
        ];
    }
}
