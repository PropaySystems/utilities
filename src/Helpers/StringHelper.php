<?php

namespace PropaySystems\Utilities\Helpers;

use Illuminate\Support\Str;

class StringHelper
{
    /**
     * --------------------------------------------------------------------------
     * Initials
     * --------------------------------------------------------------------------
     * Get the first letter of every word and capitalize them
     * ex: "ettienne louw" will become "EL"
     *
     * @param $str
     * @param bool $upperCase
     * @return string
     */
    public static function initials($str, bool $upperCase = true): string
    {
        $ret = '';
        foreach (explode(' ', $str) as $word) {
            if (!empty($word[0])) {
                if ($upperCase) {
                    $ret .= Str::upper($word[0]);
                } else {
                    $ret .= Str::lower($word[0]);
                }
            }
        }

        return self::clean($ret);
    }

    /**
     * --------------------------------------------------------------------------
     * Capitalize first characters
     * --------------------------------------------------------------------------
     * Capitalize first letter of a word
     *
     * @param $string
     * @return string
     */
    public static function capitaliseFirstChar($string): string
    {
        return Str::ucfirst(Str::lower($string));
    }

    /**
     * --------------------------------------------------------------------------
     * Clean a string
     * --------------------------------------------------------------------------
     * Removed all white spaces and special characters
     *
     * @param $string
     * @param string $delimiter
     * @param bool $toLower
     * @param bool $removeSpecialChars
     * @return string
     */
    public static function clean($string, string $delimiter = '-', bool $toLower = false, bool $removeSpecialChars = true): string
    {
        return Str::of($string)
            ->replace(' ', $delimiter)
            ->when($toLower, function($string) {
                return Str::lower($string);
            })->when($removeSpecialChars, function($string) {
                return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
            })
            ->trim();
    }

    /**
     * --------------------------------------------------------------------------
     * Generate a password
     * --------------------------------------------------------------------------
     * This will generate a random password
     *
     * $length - the length of the generated password
     * $count - number of passwords to be generated
     * $characters - types of characters to be used in the password
     */
    public static function generatePassword($length = 15, $count = 1, $characters = 'lower_case,upper_case,numbers,special_symbols')
    {
        $symbols = [];
        $passwords = [];
        $used_symbols = '';
        $pass = '';

        $symbols['lower_case'] = 'abcdefghijklmnopqrstuvwxyz';
        $symbols['upper_case'] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $symbols['numbers'] = '1234567890';
        $symbols['special_symbols'] = '!?~@#-_+<>[]{}';

        $characters = explode(',', $characters);

        foreach ($characters as $value) {
            $used_symbols .= $symbols[$value];
        }

        $symbols_length = strlen($used_symbols) - 1;

        for ($p = 0; $p < $count; $p++) {
            $pass = '';
            for ($i = 0; $i < $length; $i++) {
                $n = rand(0, $symbols_length);
                $pass .= $used_symbols[$n];
            }
            $passwords[] = $pass;
        }

        return ($count == 1) ? $passwords[0] : $passwords;
    }

    /**
     * --------------------------------------------------------------------------
     * Mask a string
     * --------------------------------------------------------------------------
     * Mask certain amount of characters in a string
     *
     * @param $string
     * @param string $maskingCharacter
     * @param int $padLeft
     * @param int $padRight
     * @return string
     */
    public static function mask($string, string $maskingCharacter = '*', int $padLeft = 4, int $padRight = 4): string
    {
        if (strlen($string) > 0) {
            return substr($string, 0, $padLeft).str_repeat($maskingCharacter, strlen($string) - 8).substr($string, -$padRight);
        }

        return $string;
    }

    /**
     * TODO: Check if this can be removed.
     *
     * --------------------------------------------------------------------------
     * Remove special characters
     * --------------------------------------------------------------------------
     * Remove special character NOT VERY SPECIAL characters
     *
     * @param $string
     * @return string
     */
    public static function removeSpecialCharacters($string): string
    {
        foreach (self::specialCharacters() as $key => $value) {
            $message = str_replace($key, $value, $string);
        }

        $message = str_replace('  ', ' ', $message);
        $message = str_replace('–', '-', $message);
        $message = str_replace('’', "'", $message);
        $message = str_replace('“', "'", $message);
        $message = str_replace('”', "'", $message);
        $message = preg_replace("/\s+/", ' ', $message);

        return trim($message);
    }

    /**
     * --------------------------------------------------------------------------
     * Make a DB column name human readable
     * --------------------------------------------------------------------------
     * Transform db column name to human-readable
     *
     * @param $string_array
     * @return string[]
     */
    public static function dbColumnHumanReadable($string_array): array
    {
        return collect($string_array)->mapWithKeys(function ($item) {
            return [$item => self::capitaliseFirstChar(str_replace('_', ' ', $item))];
        })->sort();
    }

    /**
     * --------------------------------------------------------------------------
     * Mask a string
     * --------------------------------------------------------------------------
     * Mask certain amount of characters in a string
     *
     * Transform db column name to relation
     *
     * @param $string_array
     * @return string[]
     */
    public static function dbColumnRelation($string_array): array
    {
        return collect($string_array)->mapWithKeys(function ($item) {
            return [$item => str_replace(' ', '', lcfirst(self::capitaliseFirstChar(str_replace('_', ' ', str_replace('_id', '', $item)))))];
        })->sort();
    }

    /**
     * --------------------------------------------------------------------------
     *  Return list of special characters
     *  --------------------------------------------------------------------------
     *  This will return a list of special characters
     *
     * @return array
     */
    private static function specialCharacters(): array
    {
        return [
            'Á' => 'A', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'ö' => 'o',
            'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ó' => 'O', 'Ô' => 'O', 'Ú' => 'U', 'Û' => 'U',
            'Ý' => 'Y', 'á' => 'a', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'í' => 'i',
            'î' => 'i', 'ï' => 'i', 'ó' => 'o', 'ô' => 'o', 'ú' => 'u', 'û' => 'u', 'ý' => 'y',
        ];
    }
}
