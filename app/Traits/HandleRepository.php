<?php 

namespace App\Traits;

trait HandleRepository
{
    protected static $repository;
    private static $path = "\\App\\Repositories\\";

    protected static function repository()
    {        
        if(!self::$repository){
            $repoName = self::$path . substr(static::class, strrpos(static::class,"\\")+1,-10) . "Repository";
            self::$repository = new $repoName();
        }

        return self::$repository;
    }
}