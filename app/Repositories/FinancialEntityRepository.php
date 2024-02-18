<?php
namespace App\Repositories;

use App\Models\FinancialEntity;

class FinancialEntityRepository
{
    private $model;

    public function list()
    {
        return $this->model()->get();
    }

    public function save($request)
    {
        $entity = $this->model();
        $fields = $request->only(['name','code']);
        $entity->fill($fields);
        $entity->save();
    }

    public function find($id) : FinancialEntity
    {
        return $this->model()->findOrFail($id);
    }

    public function update($request, $id)
    {
        $financialEntity = $this->find($id);
        $fields = ['code','name'];
        $fields = $request->only($fields);
        $financialEntity->update($fields);

        return $financialEntity;
    }

    private function model() : FinancialEntity
    {
        if(!$this->model)
            $this->model = new FinancialEntity();

        return $this->model;
    }
}