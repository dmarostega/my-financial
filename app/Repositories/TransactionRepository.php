<?php 
namespace App\Repositories;

use App\Traits\HandleModel;
use Str;

class TransactionRepository
{
    use HandleModel;

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
}