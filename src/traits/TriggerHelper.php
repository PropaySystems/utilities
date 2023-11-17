<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait TriggerHelper
{
    public static function switchDatabaseTrigger($state = true, $table = null, $trigger = null, $connection = 'sqlsrv')
    {
        if (config('custom.sync.enable_audit_triggers')) {
            $triggerState = (bool) $state ? 'ENABLE' : 'DISABLE';
            DB::connection($connection)->statement("{$triggerState} TRIGGER {$table}.{$trigger} ON {$table}");
        }
    }
}
