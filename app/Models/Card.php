<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use SoftDeletes;

    protected $table = 'cards';

    protected $fillable = [
        'title',
        'number',
        'holder_name',
        'flag',
        'security_code',
        'type',
        'status',
        'user_id',
        'financial_entity_id'
    ];

    public function financialEntity()
    {
        return $this->belongsTo(FinancialEntity::class);
    }

    public function creditCard()
    {
        return $this->hasOne(CreditCard::class);
    }
}