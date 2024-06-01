<?php 
namespace App\Http\Controllers;

use App\Traits\HandleRepository;
use Carbon\Carbon;

class DashBoardController extends Controller
{
    use HandleRepository;

    public function index()
    {
        $today = Carbon::now();
        $summary =  self::repository()->summary();
        $expenses = $summary->transactions
                        ->whereNull('bill_id');

        return view('dashboard',[
            'summary' => $summary,
            'daily_expenses' =>  $expenses->sortBy('date')
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
        ]);
    }
}