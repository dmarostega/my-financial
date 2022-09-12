<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CategoryRepository as CategoryRepo;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryRepo::list();
        return view('category.index',['categories' => $categories]);
    }
}