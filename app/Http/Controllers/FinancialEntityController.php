<?php

namespace App\Http\Controllers;

use App\Http\Repositories\FinancialEntityRepository;
use Illuminate\Http\Request;

class FinancialEntityController extends Controller
{
    private static $repository;

    public function index()
    {
        return view('financial-entity.index',['financialEntities' => self::repository()->list()]);
    }

    public function create()
    {
        return view('financial-entity.create');
    }

    public function store(Request $request)
    {
        self::repository()->save($request);

        return redirect()->action([FinancialEntityController::class,'index']);
    }

    public function edit(Request $request, $id)
    {
        $financialEntity = self::repository()->find($id); 
        return view('financial-entity.edit',['financialEntity'=>$financialEntity]);
    }

    public function update(Request $request,$id)
    {
        $financialEntity = self::repository()->update( $request, $id); 
        return redirect()->action([FinancialEntityController::class,'index']);
    }

    public function delete($id)
    {
        $financialEntity = self::repository()->find($id);
        return view('financial-entity.delete',['financialEntity' => $financialEntity]);
    }

    public function destroy($id)
    {
        self::repository()->find($id)->delete();

        return redirect()->action([FinancialEntityController::class,'index']);
    }

    private static function repository()
    {
        if(!self::$repository){
            self::$repository = new FinancialEntityRepository();
        }
        return self::$repository;
    }
}