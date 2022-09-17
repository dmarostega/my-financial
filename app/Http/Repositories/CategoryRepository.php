<?php
namespace App\Http\Repositories;

use App\Models\Category;

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

    public function update($request,$id)
    {
        $category = $this->find($id);
        $campos = $request->only(['name','description']);
        $category->update($campos);

        return $category;
    }
}