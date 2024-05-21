<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::factory()->count(15)->create();
        User::first()->update(['name' => 'Diogo', 'email' =>'dmarostega@gmail.com.br']);
        User::find(2)->update(['name' => 'Dev', 'email' =>'dev@dev.com.br']);
    }
}
