<?php 
namespace App\Models;

use App\Traits\HandleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionPart extends Model
{
    protected $table = 'transactions_parts';

    protected $fillable = [
        'transaction_id',
        'due_date',
        'value'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}