<?php

namespace App\Helpers;

use App\Http\Requests\Request;

class HttpHelper
{
    /**
     * @return string
     */
    public static function getIp(): string
    {
        return Request::ip();
    }

    /**
     * @return string
     */
    public static function getUserAgent(): string
    {
        return Request::userAgent();
    }

    /**
     * @return string
     */
    public static function getHost(): string
    {
        return explode('.', request()->getHost())[0];
    }
}
