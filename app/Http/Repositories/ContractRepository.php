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
        $personFields = ['name','last_name','register_number','type'];
        $fields = $request->except(array_merge(['_token'], $personFields));
        self::model()->fill($fields);
        self::model()->save();

        $person = self::model()->person()->first();
        $person->fill($request->only($personFields));
        $person->save();
        return self::model();
    }

    public function find($id)
    {
        return self::model()->findOrFail($id);
    }

    public function update($request,$id)
    {
        $personFields = ['name','last_name','register_number','type'];
        $contract = $this->find($id);
        $fields = $request->except(array_merge(['_token'],$personFields));
        $contract->update($fields);
        
        $person =  $contract->person()->first();
        $person->update( $request->only($personFields) );

        return $contract;
    }

    private static function model()
    {
        if(!self::$model)
            self::$model = new Contract();
        
        return self::$model;
    }
}