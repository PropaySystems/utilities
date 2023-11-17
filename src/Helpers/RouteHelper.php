<?php

namespace PropaySystems\Utilities\Helpers;

use Illuminate\Support\Facades\Route;

class RouteHelper
{
    /**
     * --------------------------------------------------------------------------
     *  Check current route
     *  --------------------------------------------------------------------------
     *  Check if it is the current route
     *
     * @param  array  $strings
     * @return bool
     */
    public static function currentRouteContains(array $strings): bool
    {
        foreach ($strings as $string) {
            if (str_contains(Route::currentRouteName(), $string)) {
                return true;
            }
        }

        return false;
    }
}
