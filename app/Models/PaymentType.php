<?php

namespace App\Models;

use App\Traits\HandleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentType extends Model
{
    use HandleUser;
    
    use SoftDeletes;
    
    protected $table = 'payment_types';

    protected $fillable = [
        'name',
        'description',
        'discount_timing',
        'is_default'
    ];

    public static function timings()
    {
        return ['immediate','delayed'];
    }
    
    public function statuses() : array 
    {
        return  [
                    'active' => 'Ativo',
                    'inactive' => 'Inativo'
                ];
    }
}