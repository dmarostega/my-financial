<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function list()    {
        $user = new User();
        return User::get();
    }

    public function save($request) : void{
        $user = new User();
        $campos = $request->except(['_token']);
        $user->fill($campos);
        $user->save();
    }

    public function find($id) : User{
        $user = User::find($id);
        return $user;
    }

}