<?php 
namespace App\Repositories;

use App\Models\Bill;
use App\Models\TransactionPart;
use App\Traits\HandleModel;
use Carbon\Carbon;
use Str;

class TransactionRepository
{
    use HandleModel;

    public function list()
    {
        return self::model()->get();
    }

    public function save($request)
    {
        $fields = $request->except('_token','_method');
        $transaction = self::model();
        $transaction->updateOrCreate(
            $fields
        );
    }
    
    public function update($request, $id)
    {
        $fields = $request->except('_token','_method');
        $transaction = self::model();
        $transaction->find($id)->update(
            $fields            
        );
    }

    public function findById($id)
    {
        return self::model()->findOrFail($id);
    }

    public function checkBills()
    {
        $bills = Bill::where('status','active');
        $today = new Carbon();

        foreach($bills->get() as $bill){
            switch($bill->frequency){
                case 'daily':
                    break;
                case 'monthly':                    
                    if ( !self::model()
                                ->where('bill_id',$bill->id)
                                ->whereMonth('date', $today->month)
                                ->count()
                        ){
                            $fields = [
                                'bill_id' => $bill->id,
                                'title' => $bill->title,
                                'value' => $bill->value,
                                'date' => $bill->due_date,
                                'category_id' => $bill->category_id,
                                'payment_type_id' => $this->listRelation('paymentType')[0]->id
                            ];
                            
                             self::model()->create(
                                $fields 
                             );
                        }
                    break;
                case 'yearly':
                    break;
            }
        }
    }

    public function checkTransactions()
    {
        $transactions = self::model()->whereDoesntHave('transactionParts');

        foreach ($transactions->get() as $key => $transaction) {
            $fields = [
                'transaction_id' => $transaction->id,
                'due_date' =>  $transaction->date,
                'value' => $transaction->value
            ];

            TransactionPart::create(
                $fields
            );
        }

        foreach(self::model()->with(['transactionParts'])
                ->whereIn('payment_type_id', [1,3,4])
                ->whereHas('transactionParts', function($query){
                    $query->whereNull('payment_date');
                })->get() as $transaction){
            $transactinPart = $transaction->transactionPartOfMonth();
            
            $transactinPart->payment_date = $transaction->date;
            $transactinPart->value_paid = $transaction->value;
            
            $transactinPart->save();
        }
    }

    public function listRelation($relation){
        $namespace = "\\App\\Models\\";
        $relation = Str::ucfirst($relation);
        $model = $namespace . $relation;
        return $model::get();
    }
}