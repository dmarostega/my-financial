<?php
namespace App\Http\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryRepository
{
    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function list()
    {
        return Category::get();
    }

    public function save($request)
    {
        $campos = $request->except(['_token']);
        $this->category->fill($campos);
        $this->category->save();        
    }

    public function find($id)
    {
        return  $this->category->findOrFail($id);
    }
    }
}