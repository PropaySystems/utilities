<?php

namespace App\Enums;

enum HttpCode: int
{
    case OK = 200;
    case CREATED = 201;
    case UNAUTHORISED = 401;
    case NOT_FOUND = 404;
    case NOT_ALLOWED = 405;
    case UNPROCESSABLE_ENTITY = 422;
    case INTERNAL_ERROR = 500;
    case NOT_IMPLEMENTED = 501;

    public function name(): string
    {
        return match ($this) {
            self::OK => 'OK',
            self::CREATED => 'Created',
            self::UNAUTHORISED => 'Unauthorised',
            self::NOT_FOUND => 'Not Found',
            self::NOT_ALLOWED => 'Not Allowed',
            self::UNPROCESSABLE_ENTITY => 'Unprocessable Entity',
            self::INTERNAL_ERROR => 'Internal Server Error',
            self::NOT_IMPLEMENTED => 'Not Implemented',
        };
    }
}
