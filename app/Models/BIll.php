<?php 

namespace App\Models;

use App\Models\Category;
use App\Models\Contract;
use App\Traits\CommonFilter;
use App\Traits\HandleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{    
    use HandleUser;

    use CommonFilter;

    use SoftDeletes;

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
}