<?php

namespace PropaySystems\Utilities\Helpers;

use Illuminate\Support\Facades\DB;

class DatabaseHelper
{
    /**
     * Reset table
     *
     * @param $table
     */
    public static function resetTable($table)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table($table)->truncate();
        DB::statement('ALTER TABLE '.$table.' AUTO_INCREMENT = 0');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Map collection to array
     *
     * @param $array
     * @return array
     */
    public static function mapCollectionToArray($array)
    {
        return array_map('strval', $array->toArray());
    }
}
