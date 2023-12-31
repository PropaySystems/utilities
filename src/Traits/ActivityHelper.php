<?php

namespace PropaySystems\Utilities\Traits;

use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Contracts\Activity;

trait ActivityHelper
{
    /**
     * @param  null  $preformedOn
     * @param  null  $causedBy
     */
    public function log(string $channel, string $description, $preformedOn = null, $causedBy = null, array $properties = []): ?Activity
    {
        $activity = activity($channel);

        $activity = $activity->causedBy(Auth::user());
        if (! is_null($causedBy)) {
            $activity = $activity->causedBy($causedBy);
        }

        if (! is_null($preformedOn)) {
            $activity = $activity->performedOn($preformedOn);
        }

        //        $activity = $activity->withProperties($properties);
        $activity = $activity->withProperties([
            'old' => $preformedOn?->toArray() ?? [],
            'attributes' => $properties ?? [],
        ]
        );

        return $activity->log($description);
    }
}
