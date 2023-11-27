<?php

namespace PropaySystems\Utilities\Traits;

use App\Traits\instance;

trait SaveRelations
{
    /**
     * Save belongsTo relations
     *
     * @param  instance  $model
     * @param  array  $relations
     * @return null
     */
    public function saveBelongsTo($model, $relations = [])
    {

        //check if not empty
        if (! empty($relations)) {
            foreach ($relations as $relation => $value) {
                $method = str_replace('_id', '', $relation);
                if (method_exists($model, $method)) {
                    if (empty($value)) {
                        $value = null;
                    }

                    $model->$method()->associate($value)->save();
                }
            }
        }
    }

    /**
     * Save Many To Many relations using SYNC
     *
     * @param  instance  $model
     * @param  array  $relations
     * @return null
     */
    public function sync($model, $relations = [])
    {
        //check if not empty
        if (! empty($relations)) {
            foreach ($relations as $relation => $value) {
                if (! empty($value)) {
                    $method = str_replace('_id', '', $relation);
                    if (method_exists($model, $method)) {
                        if (empty($value)) {
                            $value = [];
                        }

                        $model->$method()->sync($value);
                    }
                }
            }
        }
    }

    /**
     * Save MorphTo relations
     *
     * @param  instance  $model
     * @param  array  $relations
     * @return null
     */
    public function SaveMorphTo($model, $morphable, $morph)
    {
        $model->$morphable()->save($morph);
    }
}
