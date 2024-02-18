<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository as UserRepo;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller 
{

    private $repository;

    public function index(Request $request){
        $listUser = $this->repository()->list(); 
        return view('user.index',['users'=> $listUser]);
    }

    public function create(){
        return view('user.create');
    }

    public function store(UserRequest $request){
        $this->repository()->save($request);

        return redirect()->action([UserController::class, 'index']);
    }

    public function edit($id){
        $user = $this->repository()->find($id);     
        return view('user.edit',[
            'user' => $user
        ]);
    }

    public function update(UserRequest $request, $id){
        $this->repository()->update($request, $id);

        return redirect()->action([UserController::class, 'index']);
    }

    public function delete($id){
        $user = $this->repository()->find($id);     
        return view('user.delete', [
            'user' => $user
        ]);
    }

    public function destroy($id)
    {
        $user = $this->repository()->find($id);
        $user->delete();
        return redirect()->action([UserController::class, 'index']);
    }

    public function repository()
    {
        if(!$this->repository)
            $this->repository = new UserRepo();

        return $this->repository;
    }
}
