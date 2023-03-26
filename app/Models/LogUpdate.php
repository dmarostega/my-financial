<?php 
namespace App\Models;

use App\Traits\HandleUser;
use Illuminate\Database\Eloquent\Model;

class LogUpdate extends Model
{
    use HandleUser;
    
    protected $table = 'log_updates';

    protected $fillable = [
        'user_id',
        'entity_id'.
        'date',
        'model'
    ];
}