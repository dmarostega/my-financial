<?php 

namespace App\Observers;

use App\Models\Transaction;
use App\Models\PaymentType;
use App\Models\TransactionPart;

class TransactionObserver
{
    public function creating(Transaction $transaction)
    {   
        $user = auth()->user();
        $transaction->user_id = $user->id;

        /**
         * 
         * FIXME: Verificar após montar "Transações Parceladas"
         * 
         */
        $transaction->installment = 0;
    }

    public function created(Transaction $transaction)
    {
        $fields = [
            'transaction_id' => $transaction->id,
            'due_date' =>  $transaction->date,
            'value' => $transaction->value
        ];

        if(PaymentType::where('allow_installments', 0)
                ->where('discount_timing', 'immediate')->where('id',$transaction->payment_type_id)->count() > 0){
            $fields['payment_date'] = $transaction->date;
            $fields['value_paid'] = $transaction->value;
        }

        $t = TransactionPart::create(
            $fields
        );
    }

    public function updating(Transaction $transaction)
    {
        $fields = [
            'transaction_id' => $transaction->id,
            'due_date' =>  $transaction->date,
            'value' => $transaction->value
        ];

        if(PaymentType::where('allow_installments', 0)
                ->where('discount_timing', 'immediate')->where('id',$transaction->payment_type_id)->count() > 0){
            $fields['payment_date'] = $transaction->date;
            $fields['value_paid'] = $transaction->value;
        }

        $transactionPart = $transaction->transactionParts()->update(
            $fields            
        );
    }
}
