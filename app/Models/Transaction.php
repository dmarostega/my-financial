<?php 
namespace App\Models;

use App\Traits\CommonFilter;
use App\Traits\HandleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HandleUser;
    
    use CommonFilter;

    use SoftDeletes;
    
    protected $table = 'transactions';

    protected $fillable=[
        "date",
        "title",
        "description",
        "value",
        "payment_type_id",
        "category_id",
        'bill_id',
        'card_id'
    ];
    /**
     * 
     * CRIAR TABELA "ESTABECIMENTO, APLICATIVO"
     * CRIAR RELAÇÃO 
     * CRIAR COLUNA OBSERVAÇÃO
     * 
     */

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    public function transactionParts()
    {
        return $this->hasMany(TransactionPart::class);
    }

    public function scopeTransactionPartOfMonth($query){
        return $this->transactionParts()->whereMonth('due_date', date('m',strtotime($this->attributes['date']) ) )  
            ->first();
    }
}