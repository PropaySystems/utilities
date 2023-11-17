<?php

namespace PropaySystems\Utilities\traits;

use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Contracts\Activity;
use function App\Traits\activity;

trait ActivityHelper
{
    /**
     * @param  string  $channel
     * @param  string  $description
     * @param  null  $preformedOn
     * @param  null  $causedBy
     * @param  array  $properties
     * @return Activity|null
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
