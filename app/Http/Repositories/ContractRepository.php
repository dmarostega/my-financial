<?php 
namespace App\Http\Repositories;

use App\Models\Contract;

class ContractRepository 
{
    private static $model;

    public function list()
    {
        return self::model()->get();
    }

    public function save($request)
    {   
        $fields = $request->except(['_token']);
        self::model()->fill($fields);
        self::model()->save();

        return self::model();
    }

    public function find($id)
    {
        return self::model()->findOrFail($id);
    }

    public function update($request,$id)
    {
        $contract = $this->find($id);
        $fields = $request->except(array_merge(['_token'],$personFields));
        $contract->update($fields);

        return $contract;
    }

    private static function model()
    {
        if(!self::$model)
            self::$model = new Contract();
        
        return self::$model;
    }
}