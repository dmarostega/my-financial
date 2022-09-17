<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminat\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;
    
    protected $table = 'persons';

    protected $fillable = [
        'user_id',
        'user_name',
        'name'
    ];
}