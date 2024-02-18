<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    private $model;

    public function list()
    {
        return  $this->model()->get();
    }

    public function save($request) : void
    {
        $user = $this->model();
        $campos = $request->except(['_token']);
        $user->fill($campos);
        $user->save();
    }

    public function find($id) : User
    {
        $user = $this->model()->findOrFail($id);
        return $user;
    }

    public function update($request, $id) : User
    {
        $user = $this->model()->find($id);
        $campos = ['name','email'];
        $campos = $request->only($campos);
        $user->update($campos);

        return $user;
    }
    
    private function model() : User
    {
        if(!$this->model)
            $this->model = new User();

        return $this->model;
    }
}