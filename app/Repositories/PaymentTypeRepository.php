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

    public function save($request)
    {
        $fields = $request->except(['_token']);
        $paymentType = self::model();
        $paymentType->fill($fields);

        $paymentType->save();

        return $paymentType;
    }

    public function update($request, $id)
    {
        $paymentType = $this->find($id);
        $paymentType->fill($request->except(['_token']));

        $paymentType->save();

        return $paymentType;
    }

    private static function model()
    {
        if(!self::$model)
            self::$model = new PaymentType();

        return self::$model;
    }
}