<?php

namespace PropaySystems\Utilities\Helpers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class TranslationHelper
{
    /**
     * --------------------------------------------------------------------------
     *  Get translation from the database
     *  --------------------------------------------------------------------------
     *  Get the current translation from the database table programatically
     *
     * @return Application|array|\Illuminate\Foundation\Application|string|Translator|null
     */
    public static function translate(string $value, string $fileName, string $character = '_')
    {
        return Lang::has(config('utilities.translation_helper.path').DIRECTORY_SEPARATOR.$fileName.' . '.Str::slug($value, $character)) ? __(config('utilities.translation_helper.path').DIRECTORY_SEPARATOR.$fileName.'.'.Str::slug($value, $character)) : $value;
    }
}
