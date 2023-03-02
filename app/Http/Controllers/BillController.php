<?php 
namespace App\Http\Controllers;

use App\Repositories\BillRepository;

class BillController extends Controller 
{
    public function index(){
        return view('bill.index');
    }

    public function create(){}
    public function store(){}
    public function edit($id){}
    public function update($id){}
    public function delete($id){}
    public function destroy($id){}    

    private static function repository()
    {
        return;
    }
}