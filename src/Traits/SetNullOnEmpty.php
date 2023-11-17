<?php

namespace PropaySystems\Utilities\Traits;

trait SetNullOnEmpty
{
    private function setNullOnEmpty($input)
    {
        return $input === '' ? null : $input;
    }
}
