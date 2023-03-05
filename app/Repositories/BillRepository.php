<?php 
namespace App\Repositories;

use App\Traits\HandleModel;

class BillRepository
{
    use HandleModel;

    public function list()
    {
        return self::model()->get();
    }

    // verificar nome metodo, quem sabe create.
    public function save($request)
    {
        $fields = $request->except('_token');
        self::model()->create($fields);
    }

    public function update($request, $id)
    {
        $fields = $request->except('_token','method');
        $this->find($id)->update(
            $fields
        );
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    public function find($id)
    {
        return self::model()->find($id);
    }

    public function returnFrequencies() : array
    {
        return self::model()->frequencies();
    }

    public function returnTypes() : array
    {
       return self::model()->types();
    }

    public function returnStatuses() : array
    {
        return self::model()->statuses();
    }
}