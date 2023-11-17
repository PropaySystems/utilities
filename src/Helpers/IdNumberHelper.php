<?php

namespace PropaySystems\Utilities\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class IdNumberHelper
{
    /**
     * @param $dateOfBirth 19821208
     * @param  int  $male 0 or 1
     *
     * @throws \Exception
     */
    public static function generateIdNumber($dateOfBirth, int $male = 0): string
    {
        $gender = (int) NumberHelper::randomInt(1, 5) + ($male ? 5 : 0);
        $citizen = 0;
        $random = (int) NumberHelper::randomInt(1, 1000);

        if ($random < 10) {
            $random = '00'.$random;
        } else {
            if ($random < 100) {
                $random = '0'.$random;
            }
        }

        $total = $dateOfBirth.$gender.$random.$citizen.'8';

        $total .= self::generateLuhnDigit($total);

        $isValid = self::validateIdNumber(null, $total, null);

        if (! $isValid) {
            $total = self::generateIdNumber($dateOfBirth, $male);
        }

        return $total;
    }

    public static function generateFakeId(): string
    {
        $minYear = 20;
        $maxYear = 99;
        $year = rand($minYear, $maxYear);

        $now = new Carbon();

        $minGender = 0000;
        $maxGender = 9999;
        $gender = rand($minGender, $maxGender);

        $citizen = '18';

        $tempId = $year.$now->format('md').$gender.$citizen;

        $chars = str_split($tempId);
        $tempIdString = '';

        foreach ($chars as $char) {
            $tempIdString .= $char.',';
        }

        $tempIdStringNew = substr($tempIdString, 0, -1);
        $tempIdExplode = explode(',', $tempIdStringNew);

        $odds = [];
        $even = [];

        foreach ($tempIdExplode as $key => $val) {
            if ($key % 2 == 0) {
                $even[] = $val;
            } else {
                $odds[] = $val;
            }
        }

        $step1 = array_sum($even);
        $step2 = (int) implode($odds) * 2;
        $step3 = str_split((string) $step2);
        $step4 = array_sum($step3);
        $total = $step1 + $step4;

        $totalMod = ($total % 10);
        $lastDigit = 10 - $totalMod;

        return Str::limit($tempId.$lastDigit, 13);
    }

    public static function generateDateOfBirth(): string
    {
        return str_pad((string) mt_rand(60, 99), 2, '0', STR_PAD_LEFT).str_pad(mt_rand(1, 12), 2, '0', STR_PAD_LEFT).str_pad(
            (string) mt_rand(1, 28),
            2,
            '0',
            STR_PAD_LEFT
        );
    }

    /**
     * @param $idNumber
     * @return string
     */
    public static function getGenderCode($idNumber): string
    {
        return (substr($idNumber, 6, 4) < 5000) ? 'female' : 'male';
    }

    public static function getBirthDate($idNumber): string
    {
        $default_century = 19;

        $birthYear = substr($idNumber, 0, 2);
        if ($birthYear < date('y')) {
            $default_century = '20';
        } else {
            $default_century = '19';
        }

        $year = $default_century.substr($idNumber, 0, 2);
        $month = str_pad(substr($idNumber, 2, 2), 0, STR_PAD_LEFT);
        $day = str_pad(substr($idNumber, 4, 2), 0, STR_PAD_LEFT);

        return $year.'-'.$month.'-'.$day;
    }

    /**
     * @param $idNumber
     * @return int
     */
    public static function getAgeFromIdNumber($idNumber): int
    {
        $birthDay = self::getBirthDate($idNumber);

        $currentYear = Carbon::now()->format('Y');
        $birthYear = explode('-', $birthDay)[0];

        return (int) $currentYear - (int) $birthYear;
    }

    public static function validateIdNumber($attribute, $value, $parameters): bool
    {
        /*
            {YYMMDD}{G}{SSS}{C}{A}{Z}
            YYMMDD: Date of birth
            G : Gender. 0-4 Female; 5-9 Male.
            SSS : Sequence No. for DOB/G combination.
            C : Citizenship. 0 SA; 1 Other.
            A : Usually 8, or 9 (can be other values)
            Z : Control digit.
        */

        $match = preg_match("!^(\d{2})(\d{2})(\d{2})\d{7}$!", $value, $matches);

        if (! $match) {
            return false;
        }

        [, $year, $month, $day] = $matches;

        if ($year < date('y')) {
            $year = 20;
        } else {
            $year = 19;
        }

        if (! checkdate($month, $day, $year.substr($value, 0, 2))) {
            return false;
        }

        $d = -1;

        $a = 0;

        for ($i = 0; $i < 6; $i++) {
            $a += $value[2 * $i];
        }

        $b = 0;

        for ($i = 0; $i < 6; $i++) {
            $b = $b * 10 + $value[2 * $i + 1];
        }

        $b *= 2;

        $c = 0;

        do {
            $c += $b % 10;
            $b /= 10;
        } while ($b > 0);

        $c += $a;
        $d = 10 - ($c % 10);

        if ($d == 10) {
            $d = 0;
        }

        if ($value[strlen($value) - 1] == $d) {
            return true;
        }

        return false;
    }

    private static function generateLuhnDigit($input): int
    {
        $total = 0;
        $count = 0;
        $input_lenght = strlen($input);

        for ($i = 0; $i < $input_lenght; $i++) {
            $multiple = ($count % 2) + 1;
            $count++;

            $temp = $multiple * $input[$i];

            $temp = (int) floor($temp / 10) + ($temp % 10);
            $total += $temp;
        }

        return ($total * 9) % 10;
    }
}
