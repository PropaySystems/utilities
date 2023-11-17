<?php

namespace PropaySystems\Utilities\Helpers;

class NumberHelper
{
    /**
     * @param int $min
     * @param int $max
     * @param bool $appendTime
     * @return string
     * @throws \Exception
     */
    public static function randomInt(int $min = 1, int $max = 100000, bool $appendTime = false): string
    {
        $number = random_int($min, $max).time();

        if ($appendTime) {
            $number.time();
        }

        return $number;
    }

    /**
     * @param  int  $last
     * @param  int  $current
     * @return array
     */
    public function getPercentageDifference(int $last, int $current): array
    {
        $diff = $current - $last;
        $diff = abs($diff);
        $divider = ($last == 0) ? 1 : $last;
        $percentChange = round(($diff / $divider) * 100, 2);

        return [
            'direction' => $diff > 0 ? '+' : '-',
            'percentage' => $percentChange,
        ];
    }

    /**
     * @param  int  $number
     * @param  int  $precision
     * @param  null  $divisors
     * @return string
     */
    public function numberFormat(int $number, int $precision = 2, $divisors = null): string
    {
        // Setup default $divisors if not provided
        if (! isset($divisors)) {
            $divisors = [
                pow(1000, 0) => '', // 1000^0 == 1
                pow(1000, 1) => 'K', // Thousand
                pow(1000, 2) => 'M', // Million
                pow(1000, 3) => 'B', // Billion
                pow(1000, 4) => 'T', // Trillion
                pow(1000, 5) => 'Qa', // Quadrillion
                pow(1000, 6) => 'Qi', // Quintillion
            ];
        }

        // Loop through each $divisor and find the
        // lowest amount that matches
        foreach ($divisors as $divisor => $shorthand) {
            if (abs($number) < ($divisor * 1000)) {
                // We found a match!
                break;
            }
        }

        // We found our match, or there were no matches.
        // Either way, use the last defined value for $divisor.
        if ($number < 1000) {
            return $number;
        }

        return number_format($number / $divisor, $precision).$shorthand;
    }
}
