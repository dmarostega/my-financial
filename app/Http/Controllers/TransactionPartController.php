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
    public function confirm($id)
    {
        $transactionPart = TransactionPart::find($id);
        return view('transaction-part.confirm', ['transactionPart' => $transactionPart]);
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

        return redirect()->route('check_summary_month');
    }
}