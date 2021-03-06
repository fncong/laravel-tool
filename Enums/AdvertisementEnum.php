<?php

namespace App\Enums;

use JetBrains\PhpStorm\ArrayShape;

final class AdvertisementEnum extends \Tool\Enum
{
    public const NONE = 0;
    public const ACTION_TAB = 1;
    public const ACTION_PAGE = 2;
    public const ACTION_WEBVIEW = 3;
    public const ACTION_URL = 4;

    #[ArrayShape(['action' => "string[]"])] public function labels(): array
    {
        return [
            'action' => [
                self::NONE => '无',
                self::ACTION_TAB => '跳转底部导航',
                self::ACTION_PAGE => '跳转APP页面',
                self::ACTION_WEBVIEW => '跳转内部WebView链接',
                self::ACTION_URL => '跳转外部浏览器链接',
            ]
        ];
    }
}
