<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class TranslationHelper
{
    public static function translate($value, $fileName, $character = '_')
    {
        return Lang::has('db/'.$fileName.'.'.Str::slug($value, $character)) ? __('db/'.$fileName.'.'.Str::slug($value, $character)) : $value;
    }
}
