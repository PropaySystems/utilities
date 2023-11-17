<?php

namespace App\Traits;

trait SetNullOnEmpty
{
    private function setNullOnEmpty($input)
    {
        return $input === '' ? null : $input;
    }
}
