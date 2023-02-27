<?php 

namespace App\Observers;

use App\Models\Transaction;

class TransactionObserver
{
    public function creating(Transaction $transaction)
    {   
        $user = auth()->user();
        $transaction->user_id = $user->id;
        $transaction->repeat = 0;
    }
}
