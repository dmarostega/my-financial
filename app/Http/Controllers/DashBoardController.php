<?php 
namespace App\Http\Controllers;

use App\Traits\HandleRepository;

class DashBoardController extends Controller
{
    use HandleRepository;

    public function index()
    {
        return view('dashboard',[
            'summary' => self::repository()->index(),
            'month' => date('m')
        ]);
    }
}