<?php

namespace PropaySystems\Utilities\Helpers;

class FileHelper
{
    /**
     * --------------------------------------------------------------------------
     * Format bytes to relevant metric
     * --------------------------------------------------------------------------
     * Format bytes to better human-readable format
     */
    public static function formatBytes($bytes, int $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision).' '.$units[$pow];
    }
}
