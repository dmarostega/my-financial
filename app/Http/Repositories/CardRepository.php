<?php 

namespace App\Http\Repositories;

use App\Models\Card;
use App\Models\FinancialEntity;
use Str;

class CardRepository 
{   
    private static $model; 

    public function list()
    {
        return self::model()->get();
    }

    public function find($id)
    {
        return self::model()->findOrFail($id);
    }

    public function save($request){
        $fields = $request->except(['_token', 'credit']);
        self::model()->fill($fields);
        self::model()->save();

        if($request->has('credit') && $request->credit){
            self::model()->creditCard->credit = $request->credit;
            self::model()->creditCard->save();
        }

        return self::model();
    }

    public function update($request, $id)
    {
        $fields = $request->except(['_token','credit','_method']);
        $card = self::model()->find($id);
        $card->update($fields);
        if($request->credit){
            $card->creditCard()->update(['credit' => $request->credit]);
        }

        return $card;
    }

    public function delete($id)
    {               
    }

    public function listRelation($relation){
        $namespace = "\\App\\Models\\";
        $relation = Str::ucfirst($relation);
        $model = $namespace . $relation;
        return $model::get();
    }

    private static function model()
    {
        if(!self::$model)
            self::$model = new Card();

        return self::$model;
    }    
}