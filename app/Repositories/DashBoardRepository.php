<?php 
namespace App\Repositories;

use DB;

class DashBoardRepository
{
    public function index()
    {
        $user = auth()->user();

        $results =  $user->with([
            'bills' => function($query){
                $query->isActive();
                $query->whereDueDateActualMonth();
            },
            'transactions'=> function($query){
                $query->isActive();
                $query->whereActualMonth();
            },
            'transactions.transactionParts' => function($query){
                $query->whereNotNull('payment_date');
            },
            'contracts'           
        ])       
        ->first();

        return $results;
    }
}