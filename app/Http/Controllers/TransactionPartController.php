<?php 
namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionPart;
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

    public function paying($id)
    {
        $transactionPart = TransactionPart::find($id);
        $transactionPart->value_paid = $transactionPart->transaction->value;
        $transactionPart->payment_date = Carbon::now();
        $transactionPart->save();

        return redirect()->route('transactions');
    }
}