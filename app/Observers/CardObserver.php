<?php 
namespace App\Observers;

use App\Models\Card;
use App\Models\CreditCard;

class CardObserver
{
    /**
     * 
     * Handle the Card "creating" event.
     * 
     * @param \App\Models\Card $card
     * @return void
     * 
     */
    public function creating(Card $card)
    {
        // removed
    }

    public function created(Card $card)
    {
        if(CreditCard::acceptedTypes()->contains($card->type)){        
            $user = auth()->user();
            CreditCard::create([
                'card_id' => $card->id,
                'card_user_id' => $card->user_id
            ]);
        }
    }

    public function updated(Card $card)
    {        
        if(CreditCard::acceptedTypes()->contains($card->type)){        
            $user = auth()->user();
            CreditCard::updateOrCreate([
                'card_id' => $card->id,
                'card_user_id' => $card->user_id
            ]);
        }else if($card->has('creditCard')) {
            $card->creditCard()->delete();
        }
    }

    public function deleted(Card $card)
    {
        if($card->creditCard){
            $card->creditCard()->delete();
        }
    }
}