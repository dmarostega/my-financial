<?php 
namespace App\Observers;

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
        $finaicialAccount->person_id = auth()->user()->person->id;
     }
}