<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use App\Http\Requests\PaymentTypeRequest;
use App\Http\Repositories\PaymentTypeRepository;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller 
{
    private static $repository;    

    public function index()
    {
        return view('payment-type.index', ['paymentTypes' => self::repository()->list()]);
    }

    public function create()
    {
        return view('payment-type.create');
    }

    public function store(PaymentTypeRequest $request)
    {
        self::repository()->save($request);
        return redirect()->action([PaymentTypeController::class,'index']);
    }

    public function edit($id)
    {
       return view('payment-type.edit',[ 'paymentType' => self::repository()->find($id)]);
    }

    public function update(Request $request, $id)
    {
        self::repository()->update($request, $id);
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