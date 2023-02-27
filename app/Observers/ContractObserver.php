<?php 
namespace App\Observers;

use App\Models\Contract;
use App\Models\Person;

class ContractObserver 
{
    /**
     * 
     * Handle the Contract "creating" event.
     * 
     * @param \App\Models\Contract $contract
     * @return void
     * 
     */

     public function creating(Contract $contract)
     {
         //removed        
     }

     public function deleted(Contract $contract)
     {
        //removed
     }
}