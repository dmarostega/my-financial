<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;

class DefaultsPaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::whereNotIn('id', PaymentType::withoutGlobalScope('owner')->select('user_id'));
        if($users->count() == 0){
            echo 'Não usuários sem tipos de pagamentos, não executará!\n Verifique se existe usuários cadastrados.';
            return;     
        }

        $json = Storage::disk('local')->get('seeders/payment-types.json');
        $paymentTypes = collect(json_decode($json,true));

        $users->chunkById(500, function($userSlice) use ($paymentTypes) {
            $userSlice->each(function($user) use ($paymentTypes) {
                $paymentTypes->each(function($paymentType) use ($user) {
                    PaymentType::withoutGlobalScope('owner')->updateOrCreate([
                        'type' => $paymentType['type'],
                        'user_id' => $user->id
                    ],
                    [                        
                        'name' => $paymentType['name'],
                        'allow_installments' => $paymentType['allow_installments']
                    ]);
                });
            });
        });      
    }
}
