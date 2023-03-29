<?php 
namespace App\Http\Controllers;

use App\Traits\HandleRepository;

class SummaryController extends Controller
{
    use HandleRepository;

    public function checkSummaryMonth()
    {    
        self::repository()->check();

        return redirect()->route('dashboard');
    }
}