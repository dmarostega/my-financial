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

        return view('dashboard',[
            'summary' => $summary,
            'month' => $today->month,
            'lastMonth' => $today->previous('month')->month,
            'nextMonth' => $today->next('month')->month,
            'expenses' => $summary->transactions
                            ->whereNull('bill_id')
                            ->whereNull('transactionParts.payment_date')
                            ->sortBy('date')
                            ->groupBy(function($item) {
                                return \Carbon\Carbon::parse($item['date'])->toDateString() /*. (empty($item['card_id'])) */;
                            })
                            ->map(function($item) {
                                return $item->sum('value');
                            })
        ]);
    }
}