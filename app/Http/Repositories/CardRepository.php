<?php 

namespace App\Http\Repositories;

use App\Models\Card;

class CardRepository 
{   
    private static $model; 

    public function list()
    {
        return self::model()->get();
    }


    private static function model()
    {
        if(!self::$model)
            self::$model = new Card();

        return self::$model;
    }
}