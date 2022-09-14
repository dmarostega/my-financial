<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialEntity extends Model
{
    use SoftDeletes;

    protected $table = 'financial_entities';

    protected $fillable = [
        'name',
        'code'
    ];
}