<?php 
namespace App\Repositories;

use App\Models\Bill;
use App\Models\TransactionPart;
use App\Traits\HandleModel;
use Carbon\Carbon;
use Str;
use DB;
use Session;

class TransactionRepository
{
    use HandleModel;

    public function list(array $filters)
    {
        Session::put('transaction-list-month-selected', $filters['month'] ?? Session::get('transaction-list-month-selected'));        
        Session::put('transaction-list-year-selected', $filters['year'] ?? Session::get('transaction-list-year-selected'));
        //  dump(Session::get('transaction-list-month-selected'), Session::get('transaction-list-year-selected'));
        $filters['month'] = Session::get('transaction-list-month-selected');
        $filters['year'] = Session::get('transaction-list-year-selected');
        
        return self::model()
            ->with('transactionParts')
            ->isActive()
            ->when(Session::get('transaction-list-month-selected') === null, function($query){
                $query->whereActualMonth();
            })
            ->when(Session::get('transaction-list-year-selected')  === null, function($query) {
                $query->whereActualYear();
            })
            ->when(isset($filters['only-bills']) && $filters['only-bills'] !== null, function($query, $filters){
                $query->whereHas('bill');
            })
            ->filterMonth($filters)
            ->filterYear($filters)
            ->filterOnlyBills($filters)
            ->orderByDesc('date')
            ->paginate(15)->appends($filters);
    }

    public function save(array $fields)
    {
        $transaction = self::model();
        
        if(isset($fields['time']) ) {
            $fields['date'] = substr($fields['date'], 0, 10) . ' ' . $fields['time'];
            unset($fields['time']);
        }

        $transaction->fill(
            $fields
        );
        $transaction->save();
                
        return $transaction;
    }
    
    public function update(array $fields, $id)
    {        
        $transaction = self::model();
        
        if(isset($fields['time']) ) {
            $fields['date'] = substr($fields['date'], 0, 10) . ' ' . $fields['time'];
            unset($fields['time']);
        }

        $transaction->find($id)->update(
            $fields            
        );
    }

    public function findById($id)
    {
        return self::model()->findOrFail($id);
    }

    /**
     * @method checkBills
     * 
     * Gera transações de contas fixas para o Mês corrente.
     * 
     * Tela: dashboard
     */
    public function checkBills($bills = null)
    {
        if(!$bills){
            $bills = Bill::where('status','active')->get();
            $date = new Carbon();
        }

        foreach($bills as $bill){
            switch($bill->frequency){
                case 'daily':
                    break;
                case 'monthly':      
                   
                    if ( !self::model()
                                ->where('bill_id',$bill->id)
                                ->whereMonth('date', $date->month  ?? $bill->due_date )
                                ->whereYear('date', $date->year)
                                ->count()
                        ){
                            $fields = [
                                'bill_id' => $bill->id,
                                'title' => $bill->title,
                                'value' => $bill->value,
                                'date' =>  $date ?? $bill->due_date,
                                'category_id' => $bill->category_id,
                                'payment_type_id' => $this->listRelation('paymentType')->where('is_default',1)->first()->id ?? 1 
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

    /**
     * @method checkTransactions
     * 
     * Gera transações para 
     */
    public function checkTransactions()
    {
        $transactions = self::model()
                        ->whereDoesntHave('transactionParts')
                        ->whereDoesntHave('bill');

        foreach(self::model()->with(['transactionParts'])
                ->whereIn('payment_type_id', [1,3,4, 7]) // NOTE - dinheiro, décito, tranferência, pix
                ->whereHas('transactionParts', function($query){
                    $query->whereNull('payment_date');
                })->get() as $transaction){
            $transactionParts = $transaction->transactionPartOfMonth();

            $transactionParts->get()->each(function($transactionPart) use ($transaction) {
                $transactionPart->payment_date = $transaction->date;
                $transactionPart->value_paid = $transaction->value;
                
                $transactionPart->save();
            });
        }
    }

    public function listRelation($relation){
        $namespace = "\\App\\Models\\";
        $relation = Str::ucfirst($relation);
        $model = $namespace . $relation;
        return new $model();
    }

    public static function yearsWithTransaction() {
        return self::model()->selectRaw('YEAR(date) as year')->groupBy(DB::raw('YEAR(date)'))->pluck('year');
    }
}