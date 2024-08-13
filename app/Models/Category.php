<?php

namespace App\Models;

use App\Traits\HandleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HandleUser;

    use SoftDeletes;
    
    protected $table = "categories";

    protected $fillable =[
        'name',
        'description'
    ];
}