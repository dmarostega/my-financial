<?php 
namespace App\Repositories;

use DB;
use App\Models\User;

class DashBoardRepository
{
    public function summary()
    {
        $results = User::with([
            'bills' => function($query){
                $query->isActive();
                $query->whereDueDateActualMonth();
                $query->whereDueDateActualYear();
            },
            'transactions'=> function($query){
                $query->isActive();
                $query->whereActualMonth();
                $query->whereActualYear();
            },
            'transactions.transactionParts' => function($query){
                //  $query->whereNotNull('payment_date');
            },
            'transactions.bill' => function($query){
                $query->isActive();
            },
            'transactions.card',
            'transactions.paymentType',
            'contracts',
            'financialAccounts.entity'           
        ])       
        ->find(auth()->user()->id);
        return $results;
    }
}