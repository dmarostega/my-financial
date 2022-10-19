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
        $user = auth()->user();
        $card->user_id = $user->id;
        $card->user_name = $user->name;
    }

    public function created(Card $card)
    {
        $creditTypes = collect(['credit','multiple','prepaid']);
        
        if($creditTypes->contains($card->type)){        
            $user = auth()->user();
            CreditCard::create([
                'card_id' => $card->id,
                'card_user_name' => $card->user_name,
                'card_user_id' => $card->user_id,
                'card_user_person_id' => $user->person->id
            ]);
        }
    }

    public function updated(Card $card)
    {
        $creditTypes = collect(['credit','multiple','prepaid']);
        
        if($creditTypes->contains($card->type)){        
            $user = auth()->user();
            CreditCard::updateOrCreate([
                'card_id' => $card->id,
                'card_user_name' => $card->user_name,
                'card_user_id' => $card->user_id,
                'card_user_person_id' => $user->person->id
            ]);
        }
    }

    public function deleted(Card $card)
    {
        if($card->creditCard){
            $card->creditCard()->delete();
        }
    }
}