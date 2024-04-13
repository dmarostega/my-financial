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

        return view('dashboard',[
            'summary' => self::repository()->summary(),
            'month' => $today->month,
            'lastMonth' => $today->previous('month')->month,
            'nextMonth' => $today->next('month')->month    
        ]);
    }
}