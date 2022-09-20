<?php
namespace App\Models;

use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model 
{
    use SoftDeletes;

    protected $table = 'contracts';

    protected $fillable =[
        'title',
        'value',
        'prediction',
        'date_init',
        'date_end'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}