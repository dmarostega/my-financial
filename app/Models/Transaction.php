<?php 
namespace App\Models;

use App\Traits\HandleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HandleUser;
    
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
}