<?php 

namespace App\Traits;

trait HandleModel
{
    protected static $model;
    private static $path = "\\App\\Models\\";

    protected static function model()
    {        
        if(!self::$model){
            $modelName = self::$path . substr(static::class, strrpos(static::class,"\\")+1,-10);
            self::$model = new $modelName();
        }

        return self::$model;
    }
}