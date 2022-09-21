<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialAccount extends Model 
{
    protected $table = 'financial_accounts';

    protected $fillable = [
        'entity_number',
        'entity_dv',
        'account',
        'account_dv'
    ];

    public function entity()
    {
        return $this->belongsTo(FinancialEntity::class);
    }
}