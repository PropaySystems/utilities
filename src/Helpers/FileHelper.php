<?php

namespace App\Helpers;

class FileHelper
{
    /**
     * @param $size
     * @param  int  $precision
     * @return string
     */
    public static function formatFilesize($size, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        $step = 1024;
        $i = 0;

        while (($size / $step) > 0.9) {
            $size /= $step;
            $i++;
        }

        return round($size, $precision).' '.$units[$i];
    }
}
