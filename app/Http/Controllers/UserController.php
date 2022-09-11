<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository as UserRepo;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller 
{
    public function index(Request $request){
        $listUser = UserRepo::list(); 
        return view('user.index',['listUser'=> $listUser]);
    }

    public function create(){
        return view('user.create');
    }

    public function store(UserRequest $request){
        $userRepo = new UserRepo();
        $userRepo->save($request);

        return redirect()->action([UserController::class, 'index']);
    }

    public function edit($id){
        $user = UserRepo::find($id);     
        return view('user.edit',[
            'user' => $user
        ]);
    }

    public function update(UserRequest $request, $id){
        $userRepo = new UserRepo();
        $userRepo->update($request, $id);

        return redirect()->action([UserController::class, 'index']);
    }

    public function delete($id){
        $userRepo = new UserRepo();
        $user = $userRepo->find($id);     
        return view('user.delete', [
            'user' => $user
        ]);
    }

    public function destroy($id)
    {
        $userRepo = new UserRepo();
        $user = $userRepo->find($id);
        $user->delete();
        return redirect()->action([UserController::class, 'index']);
    }
}
