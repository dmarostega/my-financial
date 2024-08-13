<?php
namespace App\Repositories;

use App\Models\PaymentType;

class PaymentTypeRepository
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

    public function save(array $campos)
    {        
        $paymentType = self::model();
        $paymentType->fill($fields);

        $paymentType->save();

        return $paymentType;
    }

    public function update(array $campos, $id)
    {
        $paymentType = $this->model()->find($id);
        $paymentType->fill($campos);

        $paymentType->save();

        return $paymentType;
    }

    public function returnStatuses() : array
    {
        return self::model()->statuses();
    }

    public function returnTimings() : array 
    {
        return self::model()->timings();
    }

    private static function model()
    {
        if(!self::$model)
            self::$model = new PaymentType();

        return self::$model;
    }
}