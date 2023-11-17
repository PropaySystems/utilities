<?php

namespace PropaySystems\Utilities\Traits;

trait SaveToUpper
{
    public function setAttribute($key, $value)
    {
        parent::setAttribute($key, $value);

        if (is_string($value) && ! in_array($key, config('utilities.save_to_upper.exclusions'))) {
            $this->attributes[$key] = trim(strtoupper($value));
        }
    }
}
