<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CategoryRepository as CategoryRepo;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $repository;

    public function index()
    {
        $categories = CategoryRepository::list();
        return view('category.index',['categories' => $categories]);
    }

    public function create(Request $request)
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
        $this->repository()->save($request);
        return redirect()->action([CategoryController::class, 'index']);
    }

    public function edit(Request $request, $id)
    {
        $category = $this->repository()->find($id);
        return view('category.edit',['category' => $category]);
    }

    public function update(CategoryRequest $request,$id)
    {
        return redirect()->action([UserController::class, 'index']);
    }

    public function delete(Request $request, $id)
    {
        return view('category.delete',['id' => $id]);
    }

    private function repository(){
        if(!$this->repository){
            $this->repository = new CategoryRepository();
        }
        return  $this->repository;
    }
}