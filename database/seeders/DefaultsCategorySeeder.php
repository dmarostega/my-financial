<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use DB;

class DefaultsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();
            
            $users = \App\Models\User::whereNotIn('id', Category::withoutGlobalScope('owner')->select('user_id'));

            if($users->count() == 0){
                echo 'Normalizado, não executará!';
                return;       
            }
            
            $json = \Illuminate\Support\Facades\Storage::disk('local')->get('seeders/categories.json');
            $categories = collect(json_decode($json, true));
    
            $users->chunkById(500, function($userSlice) use ($categories) {
                $userSlice->each(function($user) use ($categories) {
                    $categories->each(function($category) use ($user) {
                        Category::withoutGlobalScope('owner')->updateOrCreate([
                            'user_id' => $user->id,
                            'name' => $category['name']
                        ],
                        [
                            'name' => $category['name'],
                            'description' => $category['description']
                        ]);
                    });
                });
                DB::commit();
            });
        } catch (\Throwable $th) {
            DB::rollback();
            dump($th);
        }
       
    }
}
