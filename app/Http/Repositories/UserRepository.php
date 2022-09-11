<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository
{
    public function list()
    {
        $user = new User();
        return User::get();
    }

    public function save($request) : void
    {
        $user = new User();
        $campos = $request->except(['_token']);
        $user->fill($campos);
        $user->save();
    }

    public function find($id) : User
    {
        $user = User::find($id);
        return $user;
    }

    public function update($request, $id) : User
    {
        $user = User::find($id);
        $campos = ['name','email'];
        $campos = $request->only($campos);
        $user->update($campos);

        return $user;
    }

}