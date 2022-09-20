<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;
    
    protected $table = 'persons';

    protected $fillable = [
        'user_id',
        'user_name',
        'name',
        'last_name',
        'type',
        'register_number'
    ];
}