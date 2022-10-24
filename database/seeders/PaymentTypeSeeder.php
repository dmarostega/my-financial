<?php
namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    public function run()
    {
        $types = ['Dinheiro' => 'dinheiro','Cartão de Crédito' => 'credito','Cartão de Débito' => 'debito'];

        foreach($types as $name => $type){
            PaymentType::updateOrInsert([
                'name' => $name,
                'type' => $type
            ]);
        }
    }
}
