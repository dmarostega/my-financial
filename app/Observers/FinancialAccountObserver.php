<?php 
namespace App\Observers;

use App\Models\FinancialAccount;

class FinancialAccountObserver 
{
    /**
     * 
     * Handle the financial account "creating" event.
     * 
     * @param \App\Models\FinancialAccount
     * @return void
     * 
     */

     public function creating(FinancialAccount $financialAccount)
     {
        $financialAccount->person_id = auth()->user()->person->id;
     }
}