<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogUpdateField extends Model
{
    protected $table = 'log_updates_fields';

    protected $fillable = [
        'log_updates_id', 
        'attribute', 
        'value',
        'original'
    ];
}