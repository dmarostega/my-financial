<?php 

namespace App\Observers;

use App\Models\Transaction;
use App\Models\TransactionPart;

class TransactionObserver
{
    public function creating(Transaction $transaction)
    {   
        $user = auth()->user();
        $transaction->user_id = $user->id;
        $transaction->repeat = 0;
    }

    public function created(Transaction $transaction)
    {
        $fields = [
            'transaction_id' => $transaction->id,
            'due_date' =>  $transaction->date,
            'value' => $transaction->value
        ];

        switch($transaction->type){
            case 1:
            case 3:
            case 4:
                $fields['payment_date'] = date('Y-m-d h:i:s');
                break;
        }

        TransactionPart::create(
            $fields
        );
    }
}
