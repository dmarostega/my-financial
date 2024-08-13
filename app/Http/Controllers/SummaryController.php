<?php 
namespace App\Http\Controllers;

use App\Traits\HandleRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bill;
use App\Models\FinancialAccount;
use App\Models\Transaction;
use App\Models\Contract;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class SummaryController extends Controller
{
    use HandleRepository;

    public function index()
    {
        return view('summary-month.index', ['summaries' => self::repository()->list()]);
    }

    public function checkSummaryMonth()
    {    
        self::repository()->check();

        if(self::repository()->hasPreviousMonth()){
            return view('summary-month.confirm');
        }
       
        return redirect()->route('dashboard');
    }

    public function selectingResources()
    {   
        $resources = User::with([
            'bills',
            'contracts',
            'financialAccounts.entity'
        ])->find(auth()->user()->id);
        
        return view('summary-month.selecter', ['resources' => $resources, 'month' => Carbon::now()->subMonth(1)->month]);
    }

    public function createResources(Request $request, $month)
    {
        $bills = collect();
        foreach(Arr::whereNotNull($request->bills)  as $billId => $value){
            // if(Transaction::where('bill_id', $billId)->whereMonth('date',$month)->count() > 0 ){
            //     $bills->push($bill);
            //     continue;
            // }
            $bill = Bill::find($billId);
            $bill->value = $value;
            $bill->due_date = Carbon::parse($bill->due_date)->setMonth($month)->setYear(Carbon::now()->year)->toDateTimeString();
            $bills->push($bill);
        }

        if($bills->count() > 0){
            (new TransactionRepository())->checkBills($bills);
        }

        $financialAccounts = collect();
        foreach(Arr::whereNotNull($request->financial_accounts)  as $accountId => $value){
            $financialAccount = FinancialAccount::find($accountId);
            $financialAccount->balance = $value;
            $financialAccounts->push($financialAccount);
        }

        $contracts = collect();
        foreach(Arr::whereNotNull($request->contracts) as $contractId => $value){
            $contract = Contract::find($contractId);
            $contract->value = $value;
            $contract->prediction = $value;
            $contracts->push($contract);
        }

        self::repository()->check($month, $bills, $contracts, $contracts);

        return redirect()->route('dashboard');
    }
}