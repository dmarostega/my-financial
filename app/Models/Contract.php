<?php
namespace App\Models;

use App\Models\Person;
use App\Traits\CastingAttributes;
use App\Traits\HandleUser;
use App\Traits\CommonFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model 
{
    use HandleUser;

    use CastingAttributes;

    use CommonFilter;

    use SoftDeletes;

    protected $table = 'contracts';

    protected $fillable =[
        'title',
        'value',
        'prediction',
        'date_init',
        'date_end',
        'person_id',
        'status'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function bill()
    {
        return $this->hasOne(Bill::class);
    }
    
    public function statuses() : array 
    {
        return  [
                    'active' => 'Ativo',
                    'inactive' => 'Inativo'
                ];
    }

    /**
     * NOTE: Mutations
     */
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = $this->moneyToDatabase($value);
    }

    public function setPredictionAttribute($prediction)
    {
        $this->attributes['prediction'] = $this->moneyToDatabase($prediction);
    }

    // public function transaction()
    // {
    //     return $this->hasOne(Transaction::class);
    // }

    // public function transactions()
    // {
    //     return $this->hasMany(Transaction::class);
    // }
}