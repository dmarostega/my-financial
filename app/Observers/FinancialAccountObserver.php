<?php 
namespace App\Observers;

use App\Models\FinancialAccount;
use App\Models\FinancialEntity;

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
        $financialAccount->financial_entity_user_id = FinancialEntity::find($financialAccount->financial_entity_id)->id;
     }
}