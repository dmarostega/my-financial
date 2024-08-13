<?php 
namespace App\Http\Controllers;

use App\Models\TransactionPart;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionPartController extends Controller
{
    /**
     * Transaction $id
     */
    public function confirm($id, $action = 'transaction')
    {
        $transactionPart = TransactionPart::find($id);
        return view('transaction-part.confirm', ['transactionPart' => $transactionPart, 'action' => $action]);
    }

    public function transaction(Request $request, $id)
    {
        $transactionPart = TransactionPart::find($id);
        $transactionPart->value_paid = $request->value_paid ?? $transactionPart->transaction->value;
        
        $transactionPart->discount = (double) $request->discount;
        $transactionPart->fees = (double) $request->fees;
        
        if($transactionPart->discount)
            $transactionPart->value_paid = $transactionPart->value_paid - $transactionPart->discount;

        if($transactionPart->fees)
            $transactionPart->value_paid = $transactionPart->value_paid + $transactionPart->fees;

        $transactionPart->payment_date = Carbon::now();

        $transactionPart->save();

        return redirect()->route('summary.check_month');
    }

    public function extort(Request $request, int $id){
        $transactionPart = TransactionPart::find($id);
        $transactionPart->value_paid = null;
        $transactionPart->payment_date = null;
        $transactionPart->discount = 0;
        $transactionPart->fees = 0;

        $transactionPart->save();

        return redirect()->route('transactions');        
    }
}