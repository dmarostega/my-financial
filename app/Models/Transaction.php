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
        "type",
        "category_id"
    ];

    public function paymentType()
    {
        return $this->hasOne(PaymentType::class,'id','type');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}