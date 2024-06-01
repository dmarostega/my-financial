<?php 
namespace App\Http\Controllers;

use App\Traits\HandleRepository;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    use HandleRepository;

    public function index(Request $request)
    {
        $filters = $request->only(['actual-month']);
        return view('transaction.index',['transactions' => self::repository()->list($filters)]);
    }

    public function create()
    {
        return view('transaction.create', [
                    'types' => self::repository()->listRelation('paymentType')
                            ->orderBy('name')
                            ->get(), 
                    'cards' => self::repository()->listRelation('card')
                            ->orderBy('title')
                            ->get(),
                    'categories'=> self::repository()->listRelation('category')
                            ->orderBy('name')
                            ->get()]);
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
                    'types' => self::repository()->listRelation('paymentType')->get(),
                    'cards' => self::repository()->listRelation('card')->get(),
                    'categories' => self::repository()->listRelation('category')->get()]);
    }

    public function update(Request $request, $id)
    {
        try {
            self::repository()->update($request, $id);
            return redirect()->route('transactions');
        } catch (\Throwable $th) {
            dd($th);
        }
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

    public function checkBills()
    {
        self::repository()->checkBills();
        return  back();
    }

    public function checkTransactions()
    {
        self::repository()->checkTransactions();
        return back();
    }
}