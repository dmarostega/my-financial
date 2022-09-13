<?php
namespace App\Http\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryRepository
{
    public function list()
    {
        return Category::get();
    }

    public function save($request)
    {
        $category = new Category();
        $campos = $request->except(['_token']);
        $category->fill($campos);
        $category->save();        
    }
}