<?php

namespace App\Helpers;

class SmsHelper
{
    public static function multipart_count($str)
    {
        $one_part_limit = 160; // use a constant i.e. GSM::SMS_SINGLE_7BIT
        $multi_limit = 153; // again, use a constant
        $max_parts = 3; // ... constant

        $str_length = self::count_gsm_string($str);
        if ($str_length === -1) {
            $one_part_limit = 70; // ... constant
            $multi_limit = 67; // ... constant
            $str_length = self::count_ucs2_string($str);
        }

        if ($str_length <= $one_part_limit) {
            // fits in one part
            return 1;
        }

        if ($str_length > ($max_parts * $multi_limit)) {
            // too long
            return -1; // or throw exception, or false, etc.
        }

        // divide the string length by multi_limit and round up to get number of parts
        return ceil($str_length / $multi_limit);
    }

    protected static function count_gsm_string($str)
    {
        // Basic GSM character set (one 7-bit encoded char each)
        $gsm_7bit_basic = "@£\$¥èéùìòÇ\nØø\rÅåΔ_ΦΓΛΩΠΨΣΘΞÆæßÉ !\"#¤%&'()*+,-./0123456789:;<=>?¡ABCDEFGHIJKLMNOPQRSTUVWXYZÄÖÑÜ§¿abcdefghijklmnopqrstuvwxyzäöñüà";

        // Extended set (requires escape code before character thus 2x7-bit encodings per)
        $gsm_7bit_extended = '^{}\\[~]|€';

        $len = 0;
        $str_lenght = mb_strlen($str);

        for ($i = 0; $i < $str_lenght; $i++) {
            $c = mb_substr($str, $i, 1);
            if (mb_strpos($gsm_7bit_basic, $c) !== false) {
                $len++;
            } elseif (mb_strpos($gsm_7bit_extended, $c) !== false) {
                $len += 2;
            } else {
                return -1; // cannot be encoded as GSM, immediately return -1
            }
        }

        return $len;
    }

    // Internal encoding must be set to UTF-8,
    // and the input string must be UTF-8 encoded for this to work correctly
    protected static function count_ucs2_string($str)
    {
        $utf16str = mb_convert_encoding($str, 'UTF-16', 'UTF-8');
        // C* option gives an unsigned 16-bit integer representation of each byte
        // which option you choose doesn't actually matter as long as you get one value per byte
        $byteArray = unpack('C*', $utf16str);

        return count($byteArray) / 2;
    }
}
