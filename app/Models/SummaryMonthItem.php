<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SummaryMonthItem extends Model
{
    use SoftDeletes;
    
    protected $table = 'summary_month_itens';

    protected $fillable = [
        'summary_month_id',
        'entity_id',
        'model',
        'value',
        'ammount',
        'in_process'
    ];    

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function financialAccount()
    {
        return $this->belongsTo(FinancialAccount::class);
    }
}