<?php

namespace PropaySystems\Utilities\traits;

use Illuminate\Support\Facades\DB;

trait TriggerHelper
{
    /**
     * @param $state
     * @param $table
     * @param $trigger
     * @param $connection
     * @return void
     */
    public static function switchDatabaseTrigger($enable = true, $table = null, $trigger = null, string $connection = 'sqlsrv'): void
    {
        if (config('utilities.trigger.enable_trigger')) {
            $triggerState = (bool) $enable ? 'ENABLE' : 'DISABLE';
            DB::connection($connection)->statement("{$triggerState} TRIGGER {$table}.{$trigger} ON {$table}");
        }
    }
}
