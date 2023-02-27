<?php

namespace App\Models;

use App\Traits\HandleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialEntity extends Model
{
    use HandleUser;

    use SoftDeletes;

    protected $table = 'financial_entities';

    protected $fillable = [
        'name',
        'code'
    ];
}