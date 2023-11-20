<?php

namespace PropaySystems\Utilities\Helpers;

use App\Models\System\SystemPreference;
use Illuminate\Support\Facades\Cache;

class Logo
{
    public function handle()
    {
        $preference = Cache::rememberForever(SystemPreference::SITE_LOGO, function () {
            return SystemPreference::where('key', SystemPreference::SITE_LOGO)->first();
        });

        return $preference ? $preference->value : null;
    }
}
