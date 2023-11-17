<?php

namespace PropaySystems\Utilities\traits;

trait SaveToUpper
{
    public function setAttribute($key, $value)
    {
        parent::setAttribute($key, $value);

        $exclude = [
            'email',
            'import_note',
            'email',
            'email_secondary',
            'password',
            'remember_token',
            'avatar',
        ];

        if (is_string($value) && ! in_array($key, $exclude)) {
            $this->attributes[$key] = trim(strtoupper($value));
        }
    }
}
