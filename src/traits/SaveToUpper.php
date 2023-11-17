<?php

namespace App\Traits;

trait SaveToUpper
{
    public function setAttribute($key, $value)
    {
        parent::setAttribute($key, $value);

        $exclude = [
            'email',
        ];

        if (is_string($value) && ! in_array($key, $exclude)) {
            $this->attributes[$key] = trim(strtoupper($value));
        }
    }
}
