<?php
namespace App\Http\Controllers;

use App\Models\FinancialAccount;

class FinancialAccountController extends Controller 
{
    private static $repository;

    public function index()
    {        
        return view('financial-account.index');
    }

    public function create()
    {        
        return view('financial-account.create');
    }

    public function store(){}
    public function edit(){
        return view('financial-account.edit');
    }
    public function update(){}
    public function delete(){
        return view('financial-account.delete');
    }
    public function destroy(){}


    private static function repository()
    {
        if(!self::$repository)
            self::$repository = new FinancialAccountRepository();

        return self::$repository;
    }
}