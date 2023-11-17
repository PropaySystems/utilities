<?php

namespace PropaySystems\Utilities\traits;

trait SetNullOnEmpty
{
    private function setNullOnEmpty($input)
    {
        return $input === '' ? null : $input;
    }
}
