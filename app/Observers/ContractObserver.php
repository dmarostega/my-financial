<?php 
namespace App\Observers;

use App\Models\Contract;
use App\Models\Person;

class ContractObserver 
{
    /**
     * Handle the Contract "creating" event.
     * 
     * @param \App\Models\Contract $contract
     * @return void
     */

     public function creating(Contract $contract)
     {
        $person = Person::create([
            'name' => $contract->title,
            'type' => 'legal'
        ]);

        $contract->person_id = $person->id;
     }

     public function deleted(Contract $contract)
     {
        $contract->person()->delete();
     }
}