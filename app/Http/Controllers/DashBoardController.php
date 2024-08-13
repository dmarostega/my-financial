<?php 
namespace App\Http\Controllers;

use App\Traits\HandleRepository;
use Carbon\Carbon;

class DashBoardController extends Controller
{
    use HandleRepository;

    public function index()
    {
        $actualMonth = Carbon::now();
        $lastMonth = clone $actualMonth;
        $nextMonth = clone $actualMonth;

        $summary =  self::repository()->summary();
        $expenses = $summary->transactions
                        ->whereNull('bill_id');

        return view('dashboard',[
            'summary' => $summary,
            'actualMonth' => $actualMonth,
            'lastMonth' => $lastMonth->previous('month'),
            'nextMonth' => $nextMonth->next('month'),
            'daily_expenses' => $expenses->sortBy('date')
                        ->groupBy(function($item) {
                            return \Carbon\Carbon::parse($item['date'])->toDateString();
                        })
                        ->map(function($item) {
                            return $item->sum('value');
                        }),
            'expenses' =>  $expenses,                        
            'expenses_paided' =>  $expenses->filter(function($item){
                return $item->paymentType->discount_timing == 'immediate';
            }),
            'expenses_to_pay' =>  $expenses->filter(function($item){
                return $item->paymentType->discount_timing == 'delayed';
            }),
            'total_received' => $summary->transactions
                    ->filter(function($item) {
                        if($item->bill)
                            return $item->bill_id && $item->bill->type == 'to_receive' && !empty($item->transactionParts->first()->payment_date);
                    })
                    ->sum('value')
        ]);
    }
}