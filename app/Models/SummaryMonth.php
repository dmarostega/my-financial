<?php
namespace App\Models;

use App\Traits\HandleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SummaryMonth extends Model
{
    protected $table = 'summary_month';

    protected $fillable = [
        'date',
        'in_process'
    ];    
    
    use HandleUser;

    use SoftDeletes;

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function financialAccount()
    {
        return $this->belongsTo(FinancialAccount::class);
    }

    public function items()
    {
        return $this->hasMany(SummaryMonthItem::class);
    }
}