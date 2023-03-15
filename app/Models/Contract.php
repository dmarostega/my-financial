<?php
namespace App\Models;

use App\Models\Person;
use App\Traits\HandleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model 
{
    use HandleUser;

    use SoftDeletes;

    protected $table = 'contracts';

    protected $fillable =[
        'title',
        'value',
        'prediction',
        'date_init',
        'date_end',
        'person_id'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function bill()
    {
        return $this->hasOne(Bill::class);
    }
}