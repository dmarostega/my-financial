<?php 
namespace App\Repositories;

use App\Models\Transaction;
use Str;

class TransactionRepository
{
    private static $model;

    public function list()
    {
        return self::model()->get();
    }

    public function save($request)
    {
        $fields = $request->except('_token','_method');
        $transaction = self::model();
        $transaction->updateOrCreate(
            $fields
        );
    }
    
    public function update($request, $id)
    {
        $fields = $request->except('_token','_method');
        $transaction = self::model();
        $transaction->find($id)->update(
            $fields            
        );
    }

    public function findById($id)
    {
        return self::model()->findOrFail($id);
    }

    public function listRelation($relation){
        $namespace = "\\App\\Models\\";
        $relation = Str::ucfirst($relation);
        $model = $namespace . $relation;
        return $model::get();
    }

    private static function model() : Transaction
    {
        if(!self::$model)
            self::$model = new Transaction();

        return self::$model;
    }
}