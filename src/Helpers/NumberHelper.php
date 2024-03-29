<?php

namespace PropaySystems\Utilities\Helpers;

class NumberHelper
{
    /**
     * @throws \Exception
     */
    public static function randomInt(int $min = 1, int $max = 100000): int
    {
        $number = random_int($min, $max);

        return (int) $number;
    }

    public static function getPercentageDifference(int $last, int $current, bool $round = false): array
    {
        $diff = $current - $last;
        $diff = abs($diff);
        $divider = ($last == 0) ? 1 : $last;
        $percentChange = round(($diff / $divider) * 100, 2);

        return [
            'direction' => $diff > 0 ? '+' : '-',
            'percentage' => ($round) ? round($percentChange) : $percentChange,
        ];
    }

    public static function numberFormat(int $number, int $precision = 2, $divisors = null): int|string
    {
        // Setup default $divisors if not provided
        if (! $divisors) {
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
        $divisor = 1000;
        $shorthand = 'B';
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

    /**
     * @return false|string
     */
    public static function combineCellPrefix($prefix, $number): bool|string
    {
        $firstChar = mb_substr($number, 0, 1, 'utf-8');

        if ($firstChar == 0) {
            return $prefix.substr($number, 1);
        } else {
            return false;
        }
    }
}
