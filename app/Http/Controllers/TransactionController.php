<?php 
namespace App\Http\Controllers;

use App\Traits\HandleRepository;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    use HandleRepository;

    public function index(Request $request)
    {
        $filters = $request->only(['actual-month','only-bills']);
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
        $redirect = redirect()->route('transactions');

        if($request->has('add_more') && $request->add_more = 'on') {
            $redirect = redirect()->route('transaction.create')
                        ->withInput($request
                            ->only(     'date',
                                        'time',
                                        'card_id',
                                        'category_id',
                                        'payment_type_id',
                                        'add_more'
                                    ));
        }

        $fields = array_filter($request->except('_token','_method','add_more'));
        self::repository()->save($fields);
       
        return $redirect;
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

        // dd($request->all());
        try {
            $fields = array_filter($request->except('_token','_method','add_more'));

            self::repository()->update($fields, $id);
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