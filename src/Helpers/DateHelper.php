<?php

namespace PropaySystems\Utilities\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use PropaySystems\Utilities\Enums\Months;

class DateHelper
{
    /**
     *  TODO: Must rework this function to use enums
     *  --------------------------------------------------------------------------
     *  Mask a string
     *  --------------------------------------------------------------------------
     *  Mask certain amount of characters in a string
     */
    public static function getMonthName($number, bool $abbreviation = false): string
    {
        return trans_choice('utilities::dates.'.(int) Str::lower($number), ($abbreviation) ? 1 : 2);
    }

    /**
     * --------------------------------------------------------------------------
     * Fiscal Year
     * --------------------------------------------------------------------------
     * This will give you the current financial year
     */
    public static function getFiscalYear(): int|string
    {
        if (date('m') > (int) Months::FEBRUARY->number()) {
            return date('Y') + 1;
        } else {
            return date('Y');
        }
    }

    /**
     * --------------------------------------------------------------------------
     * Get Time
     * --------------------------------------------------------------------------
     * TODO: Update what this actually does
     *
     * @return string
     */
    public static function getTime($time)
    {
        // Remove any non-digit characters from the input string
        $minutes = preg_replace('/[^0-9]/', '', $time);

        // Ensure that $minutes has a maximum length of 4 characters
        if (strlen($minutes) > 4) {
            $minutes = substr($minutes, 0, 4); // Truncate to 4 characters if too long
        }

        // Pad $minutes with leading zeros to ensure a valid time format ('00:00')
        $formattedMinutes = str_pad($minutes, 4, '0', STR_PAD_LEFT);

        // Extract hours and minutes from the formatted string
        $hours = substr($formattedMinutes, 0, 2);
        $minutes = substr($formattedMinutes, 2, 2);

        // Create a Carbon instance with the extracted hours and minutes
        return Carbon::createFromTime($hours, $minutes, 0)->format('H:i');
    }
}
