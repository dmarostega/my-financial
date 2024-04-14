<?php

namespace Database\Seeders;

use App\Models\FinancialEntity;
use DB;
use Illuminate\Database\Seeder;

class DefaultsFinancialEntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try{
            DB::beginTransaction();
            $users = \App\Models\User::whereNotIn('id', FinancialEntity::withoutGlobalScope('owner')->select('user_id'));
            if($users->count() == 0){
                echo 'Normalizado, não executará!';
                return;
            }
    
            $json = \Illuminate\Support\Facades\Storage::disk('local')->get('/seeders/banks.json');
            $financialEntities = collect(json_decode($json, true));
    
            $users->chunkById(500, function($userSlice) use ($financialEntities) {
                $userSlice->each(function($user) use ($financialEntities){
                    $financialEntities->each(function($financialEntity) use ($user) {
                        FinancialEntity::withoutGlobalScope('owner')->updateOrCreate([
                            'user_id' => $user->id,
                            'name' => $financialEntity['nome_fantasia']
                        ],
                        [
                           'name' => $financialEntity['nome_fantasia'],
                           'code' => $financialEntity['codigo']
                        ]);
                    });
                });
            });

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            dump($th);
        }
    }
}
