<?php 
namespace App\Models;

use App\Traits\CastingAttributes;
use App\Traits\CommonFilter;
use App\Traits\HandleUser;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HandleUser;

    use CastingAttributes;
    
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
     * NOTE: Mutations
     */
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = $this->moneyToDatabase($value);
    }


    /**
     * 
     * CRIAR TABELA "ESTABECIMENTO, APLICATIVO"
     * CRIAR RELAÇÃO 
     * CRIAR COLUNA OBSERVAÇÃO
     * 
     * Tentar lembrar para que isso descrito acima.
     * 
     */


    /**
     * NOTE = Relations
     * */
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

    /**
     *  FIXME: scope sem query.. ver
     */
    public function scopeTransactionPartOfMonth($query){
        return $this->transactionParts()->whereMonth('due_date', date('m',strtotime($this->attributes['date'])));
    }

    /**
     * 
     * NOTE: scopes
     * 
     */
    public function scopeContractsToReceive($query)
    {
        return $query->whereHas('bill', function($query){
            $query->contractsToReceive();
        })
        ->noHasPayment();
    }

    public function scopeContractsReceived($query)
    {
        return $query->whereHas('bill', function($query){
            $query->contractsToReceive();
        })
        ->hasPayment();
    }

    public function scopeHasPayment($query)
    {
        return $query->whereHas('transactionParts', function($query){
            $query->whereNotNull("payment_date");
        });
    }

    /**
     * FIXME: pagamento é validado com payment_date is  null
     */
    public function scopeNoHasPayment($query)
    {
        return $query->whereDoesntHave('transactionParts')
                    ->orWhereHas('transactionParts', function($query){
                        $query->whereNull("payment_date");
                    });
    }

    public function scopePaidOut($query)
    {
        return $query->whereHas('bill', function($query){
            $query->toPay();
        })
        ->hasPayment();
    }

    public function scopeHasPaymentIn($query, $paymentTypeIds)
    {
        if(!is_array( $paymentTypeIds )){
            $paymentTypeIds = [ $paymentTypeIds ];
        }

        return $query->whereHas('paymentType', function($query) use ($paymentTypeIds) {
            $query->whereIn('id', $paymentTypeIds);
        });
    }
    
    public function statuses() : array 
    {
        return  [
                    'active' => 'Ativo',
                    'inactive' => 'Inativo'
                ];
    }
}