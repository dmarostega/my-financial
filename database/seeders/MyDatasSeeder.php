<?php 
namespace Database\Seeders;

use App\Models\Bill;
use App\Models\FinancialEntity;
use App\Models\Card;
use App\Models\FinancialAccount;
use App\Models\User;
use Illuminate\Database\Seeder;

class MyDatasSeeder extends Seeder
{
    public function run()
    {
        $userOwner = User::withoutGlobalScope('owner')->where('email','dmarostega@gmail.com.br')->first();
        if($userOwner) {
            /**
             * Contas Bancárias
             */
            $bb = FinancialEntity::where('code', '001');
            if($this->validateModel(new FinancialAccount(), $userOwner->id, ['code'=>'001'])) {

                $financialEntities = FinancialEntity::get();

                FinancialAccount::create([
                    'entity_number' => '5238',
                    'entity_dv' => '8',
                    'account_number' => '9407' ,
                    'account_dv' => '2',
                    'financial_entity_id' => $financialEntities->where('code', '001')->first()->id,
                    'financial_entity_user_id' => $financialEntities->where('code', '001')->first()->user_id
                ]);
            }
        }
    }  
    private function validateModel($model, $ownerId, array $fields)
    {        
        $bb = $model::where(key($fields), current($fields));
     
        if($bb){
            $bbAccount =  $model::where('user_id', $ownerId)->first();
            return $bbAccount;
        }
        return false;
    }  
}