<?php 

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contract;
use App\Http\Requests\BillRequest;
use App\Traits\HandleRepository;

class BillController extends Controller 
{
    use HandleRepository;

    public function index(){
        return view('bill.index',[
                                    'bills' => self::repository()->list(), 
                                    'frequencies' => self::repository()->returnFrequencies(),
                                    'types' => self::repository()->returnTypes(),
                                    'statuses' => self::repository()->returnStatuses()
                                ]
                    );
    }

    public function create(){
        return view('bill.create',[
            'frequencies' => self::repository()->returnFrequencies(),
            'types' => self::repository()->returnTypes(),
            'statuses' => self::repository()->returnStatuses(),
            'categories' => Category::get(),
            'contracts' => Contract::get()
        ]);
    }
    public function store(BillRequest $request){
        self::repository()->save($request);

        return redirect()->route('bills');
    }

    public function edit($id){
        $bill = self::repository()->find($id);
        return view('bill.edit', [
                                    'bill' => $bill,
                                    'frequencies' => self::repository()->returnFrequencies(),
                                    'types' => self::repository()->returnTypes(),
                                    'statuses' => self::repository()->returnStatuses(),
                                    'categories' => Category::get(),
                                    'contracts' => Contract::get()
                                ]
                    );
    }
    public function update(BillRequest $request, $id){
        self::repository()->update($request, $id);

        return redirect()->route('bills');
    }

    public function delete($id){
        $bill = self::repository()->find($id);
        return view('bill.delete',['bill' => $bill]);
    }

    public function destroy($id){
        self::repository()->delete($id);
        
        return redirect()->route('bills');
    }
}