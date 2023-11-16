<?php

namespace PropaySystems\Utilities\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \PropaySystems\Utilities\Utilities
 */
class Utilities extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \PropaySystems\Utilities\Utilities::class;
    }
}
