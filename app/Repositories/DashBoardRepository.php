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
            'transactions.transactionParts',
            'contracts'           
        ])       
        ->first();

        return $results;
    }
}