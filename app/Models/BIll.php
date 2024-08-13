<?php 

namespace App\Models;

use App\Models\Category;
use App\Models\Contract;
use App\Traits\CommonFilter;
use App\Traits\HandleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\CastingAttributes;


class Bill extends Model
{    
    use HandleUser;

    use CommonFilter;

    use SoftDeletes;

    use CastingAttributes;
    
    protected $table = 'bills';

    protected $fillable = [
        'title',
        'value',
        'type',
        'frequency',
        'status',
        'user_id',
        'category_id',
        'due_date',
        'contract_id'
    ];  

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function scopeToReceive($query){
        return $query->where('type', 'to_receive');
    }
    
    public function scopeToPay($query){
        return $query->where('type', 'to_pay');
    }

    public function scopeInCards($query)
    {
        return $query->whereHas('transaction', function($query){
            $query->whereHas('card');
        });
    }

    public function scopeContractsToReceive($query)
    {
        return $query->toReceive()->whereHas('contract');
    }
        
    public function frequencies() : array
    {
        return [
                    'daily' => 'Diário',
                    'monthly' => 'Mensal',
                    'yearly' => 'Anual'
                ];
    }
    
    public function types() : array
    {
        return [
                    'to_pay' => 'A pagar',
                    'to_receive' => 'A receber'
                ];
    }

    public function statuses() : array 
    {
        return  [
                    'active' => 'Ativo',
                    'inactive' => 'Inativo'
                ];
    }
}