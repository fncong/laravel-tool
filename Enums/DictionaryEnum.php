<?php

namespace App\Enums;

use JetBrains\PhpStorm\ArrayShape;
use Tool\Enum;


final class DictionaryEnum extends Enum
{
    public const GROUP_ADVERTISEMENT = 'advertisement';

    #[ArrayShape(['group' => "string[]"])] public function labels(): array
    {
        return [
            'group' => [
                self::GROUP_ADVERTISEMENT => '广告',
            ]
        ];
    }
}
