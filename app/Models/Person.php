<?php
namespace App\Models;

use App\Traits\HandleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    // use HandleUser;
    
    use SoftDeletes;
    
    protected $table = 'persons';

    protected $fillable = [
        'user_id',
        'name',
        'last_name',
        'type',
        'register_number'
    ];
}