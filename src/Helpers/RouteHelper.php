<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class RouteHelper
{
    /**
     * @param  array  $strings
     * @return bool
     */
    public static function currentRouteContains($strings = []): bool
    {
        foreach ($strings as $string) {
            if (str_contains(Route::currentRouteName(), $string)) {
                return true;
            }
        }

        return false;
    }
}
