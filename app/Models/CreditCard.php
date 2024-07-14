<?php

namespace App\Models;

use App\Models\Card;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreditCard extends Model
{
    use SoftDeletes;

    protected $table = 'credit_cards';

    protected $fillable = [
        'card_id',
        'card_user_name',
        'card_user_id',
        'card_user_person_id'
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public static function acceptedTypes() {
        return collect(['credit','multiple','prepaid']);
    }
}