<?php
namespace App\Http\Repositories;

use App\Models\FinancialAccount;

class FinancialAccountRepository 
{
    private static $model;

    public function list()
    {
        return self::model()->with('entity')->get();
    }

    public function save($request)
    {
        $fields = $request->except(['_token']);
        $user = auth()->user();
        $fields['user_id'] = $user->id;
        $fields['user_name'] = $user->name;

        self::model()->fill($fields);
        self::model()->save();

        return self::model();
    }

    public function find($id)
    {
        return self::model()->with('entity')->findOrFail($id);
    }

    public function update($request, $id){
        $fields = $request->except(['_token']);
        $financialAccount = self::model()->find($id);

        $financialAccount->update($fields);

        return self::model();
    }

    public function delete($id)
    {
        $this->find($id)->delete();
    }

    private static function model()
    {
        if(!self::$model)
            self::$model = new FinancialAccount();

        return self::$model;
    }
}