<?php
namespace App\Http\Controllers;

use App\Repositories\ContractRepository;
use App\Http\Requests\ContractRequest;

class ContractController extends Controller
{
    private static $repository;

    public function index()
    {
        return view('contracts.index',[ 'contracts' => self::repository()->list()]);
    }

    public function create()
    {
        return view('contracts.create', ['statuses' => self::repository()->getStatuses()]);
    }

    public function store(ContractRequest $request)
    {
        $contract = self::repository()->save($request);
        return redirect()->action([ContractController::class, 'index']);
    }

    public function edit($id)
    {
        return view('contracts.edit',[
                                        'contract' => self::repository()->find($id),
                                        'statuses' => self::repository()->getStatuses()
                                    ]);
    }

    public function update(ContractRequest $request,$id)
    {
        try {
            self::repository()->update($request,$id);

            return redirect()->action([ContractController::class,'index']);
        } catch(Throwable $th) {
            dd($th);
        }
    }

    public function delete($id)
    {
        return view('contracts.delete',['contract' => self::repository()->find($id)]);
    }

    public function destroy($id)
    {
        self::repository()->find($id)->delete();
        return redirect()->action([ContractController::class,'index']);
    }

    private static function repository()
    {
        if(!self::$repository)
            self::$repository = new ContractRepository();

        return self::$repository;
    }
}