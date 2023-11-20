<?php

namespace PropaySystems\Utilities\Traits;

use App\Models\System\SystemPreference;

trait FromEmail
{
    /**
     * @return string
     */
    public function fromEmail(): string
    {
        $email = config('custom.propay.support_email');

        $preferences = SystemPreference::where([
            'category' => SystemPreference::CATEGORY_SYSTEM,
            'key' => SystemPreference::SITE_FROM_EMAIL,
        ])->first();

        if ($preferences) {
            $email = $preferences->value;
        }

        return $email ?? config('custom.propay.support_email');
    }

    /**
     * @return string
     */
    public function fromName(): string
    {
        $name = config('custom.propay.name');

        $preferences = SystemPreference::where([
            'category' => SystemPreference::CATEGORY_SYSTEM,
            'key' => SystemPreference::SITE_NAME,
        ])->first();

        if ($preferences) {
            $name = $preferences->value;
        }

        return $name ?? config('custom.propay.name');
    }
}
