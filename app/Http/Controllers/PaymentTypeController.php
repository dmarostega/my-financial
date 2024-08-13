<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use App\Http\Requests\PaymentTypeRequest;
use App\Repositories\PaymentTypeRepository;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller 
{
    private static $repository;    

    public function index()
    {
        return view('payment-type.index', [
                                            'paymentTypes' => self::repository()->list(),
                                            'statuses' => self::repository()->returnStatuses()
                                        ]);
    }

    public function create()
    {
        return view('payment-type.create', [
            'statuses' => self::repository()->returnStatuses(),
            'timings' => self::repository()->returnTimings()
        ]);
    }

    public function store(PaymentTypeRequest $request)
    {
        $campos = $request->except(['_token','_method']);
        if(isset($campos['is_default']))
            $campos['is_default'] = (int) $campos['is_default'] === 'on' ;

        self::repository()->save($campos);
        return redirect()->action([PaymentTypeController::class,'index']);
    }

    public function edit($id)
    {
       return view('payment-type.edit', [
                                            'paymentType' => self::repository()->find($id),
                                            'statuses' => self::repository()->returnStatuses(),
                                            'timings' => self::repository()->returnTimings()
                                        ]);
    }

    public function update(PaymentTypeRequest $request, $id)
    {
        $campos = $request->except(['_token','_method']);
        if(isset($campos['is_default']))
            $campos['is_default'] = (int) $campos['is_default'] === 'on' ;
        
        self::repository()->update($campos, $id);
        return redirect()->action([PaymentTypeController::class,'index']);
    }

    public function delete($id)
    {
        return view('payment-type.delete',['paymentType' => self::repository()->find($id)]);
    }

    public function destroy($id)
    {
        self::repository()->find($id)->delete();
        return redirect()->action([PaymentTypeController::class, 'index']);
    }

    private static function repository()
    {
        if(!self::$repository)
            self::$repository = new PaymentTypeRepository();

        return self::$repository;
    }
}