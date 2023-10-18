<?php

namespace App\Traits;

trait BlamableTrait
{
    public static function bootBlamableTrait()
    {
        /* When model is created */
        static::creating(function ($model) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = auth()->user()->id ?? null;
            }
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->id ?? null;
            }
        });

        /* When model is updated */ 
        static::updating(function ($model) {
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->id;
            }
        });
    }
}