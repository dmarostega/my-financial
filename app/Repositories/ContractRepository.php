<?php 
namespace App\Repositories;

use App\Models\Contract;
use App\Models\Person;


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

        $dataPerson = [
            'name' => self::model()->title,
            'type' => $fields['type'],
            "last_name" => $fields['last_name']
        ];
        
        /**
         * TODO: não salva, ver depois.
         */
        if($fields['type'] == 'legal'){
            $dataPersons['register_number'] = $fields['register_number'];
        }
        
        $person = Person::create( $dataPerson );        
        
        self::model()->person_id = $person->id;

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