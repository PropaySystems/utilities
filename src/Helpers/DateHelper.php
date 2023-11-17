<?php

namespace PropaySystems\Utilities\Helpers;

use Illuminate\Support\Str;
use PropaySystems\Utilities\Enums\Months;

class DateHelper
{
    /**
     * TODO: Must rework this function to use enums
     * --------------------------------------------------------------------------
     * Mask a string
     * --------------------------------------------------------------------------
     * Mask certain amount of characters in a string
     *
     * @param $number
     * @param  false  $abbreviation
     * @return string
     */
    public static function getMonthName($number, bool $abbreviation = false): string
    {
        return trans_choice('utilities::dates.' . (int) Str::lower($number), ($abbreviation) ? 1 : 2);
    }

    /**
     * --------------------------------------------------------------------------
     * Fiscal Year
     * --------------------------------------------------------------------------
     * This will give you the current financial year
     *
     * @return int|string
     */
    public static function getFiscalYear(): int|string
    {
        if (date('m') > (int) Months::FEBRUARY->number()) {
            return date('Y') + 1;
        } else {
            return date('Y');
        }
    }
}
