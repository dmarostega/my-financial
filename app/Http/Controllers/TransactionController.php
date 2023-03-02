<?php 
namespace App\Http\Controllers;

use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private static $repository;

    public function index()
    {
        return view('transaction.index',['transactions' => self::repository()->list()]);
    }

    public function create()
    {
        return view('transaction.create', [
                    'types' => self::repository()->listRelation('paymentType'), 
                    'categories'=> self::repository()->listRelation('category')]);
    }

    public function store(Request $request)
    {
        self::repository()->save($request);
        
        return redirect()->route('transactions');
    }

    public function edit($id)
    {
        $transaction =  self::repository()->findById($id);
        return view('transaction.edit',[
                    'transaction' => $transaction,
                    'types' => self::repository()->listRelation('paymentType'),
                    'categories' => self::repository()->listRelation('category')]);
    }

    public function update(Request $request, $id)
    {
        self::repository()->update($request, $id);

        return redirect()->route('transactions');
    }

    public function delete($id)
    {
        $transaction = self::repository()->findById($id);
        return view('transaction.delete', ['transaction' => $transaction]);
    }

    public function destroy($id)
    {
        $transaction = self::repository()->findById($id)->delete();

        return redirect()->route('transactions');   
    }

    private static function repository()
    {
        if(!self::$repository)
            self::$repository = new TransactionRepository();

        return self::$repository;
    }
}