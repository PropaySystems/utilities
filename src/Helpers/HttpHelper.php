<?php

namespace PropaySystems\Utilities\Helpers;

use Request;

class HttpHelper
{
    /**
     * --------------------------------------------------------------------------
     * Get client IP address
     * --------------------------------------------------------------------------
     * Get the currently assigned dip address for the request
     */
    public static function getIp(): string
    {
        return Request::ip();
    }

    /**
     * --------------------------------------------------------------------------
     * Get client User agent
     * --------------------------------------------------------------------------
     * Get the current browser the user is using
     */
    public static function getUserAgent(): string
    {
        return Request::userAgent();
    }

    /**
     * --------------------------------------------------------------------------
     * Get the domain name
     * --------------------------------------------------------------------------
     * Get the domain in name of the site.
     */
    public static function hostname($full = false): string
    {
        if ($full) {
            return request()->getSchemeAndHttpHost();
        }

        return request()->getHost();
    }

    /**
     * --------------------------------------------------------------------------
     * Get domain subdomain
     * --------------------------------------------------------------------------
     * Get the current subdomain you are working on
     */
    public static function subdomain(): string
    {
        return explode('.', request()->getHost())[0];
    }
}
