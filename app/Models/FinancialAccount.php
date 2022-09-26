<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialAccount extends Model 
{
    use SoftDeletes;

    protected $table = 'financial_accounts';

    protected $fillable = [
        'financial_entity_id',
        'user_id',
        'user_name',
        'entity_number',
        'entity_dv',
        'account',
        'account_dv'
    ];

    public function entity()
    {
        return $this->belongsTo(FinancialEntity::class,'financial_entity_id');
    }
}