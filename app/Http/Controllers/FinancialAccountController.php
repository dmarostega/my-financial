<?php
namespace App\Http\Controllers;

use App\Repositories\FinancialAccountRepository;
use App\Repositories\FinancialEntityRepository;
use App\Http\Requests\FinancialAccountRequest;

class FinancialAccountController extends Controller 
{
    private static $repository;

    public function index()
    {        
        return view('financial-account.index', ['financialAccounts' => self::repository()->list()]);
    }

    public function create()
    {        
        $financialEntities = new FinancialEntityRepository();
        return view('financial-account.create',['entities' => $financialEntities->list()]);
    }

    public function store(FinancialAccountRequest $request)
    {
        self::repository()->save($request);
        return redirect()->route('financial_accounts');
    }

    public function edit($id)
    {
        return view('financial-account.edit', ['financialAccount' => self::repository()->find($id), 'financialEntities' => FinancialEntityRepository::list() ]);    
    }

    public function update(FinancialAccountRequest $request,$id){
        self::repository()->update($request, $id);        
        return redirect()->route('financial_accounts');
    }
    
    public function delete($id){        
        return view('financial-account.delete', ['financialAccount' => self::repository()->find($id)]);
    }

    public function destroy($id){
        self::repository()->delete($id);
        return redirect()->route('financial_accounts');
    }

    private static function repository()
    {
        if(!self::$repository)
            self::$repository = new FinancialAccountRepository();

        return self::$repository;
    }
}