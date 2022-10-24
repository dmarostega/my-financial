<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::updateOrInsert([
            'name' => 'Lazer'
        ]);
        Category::updateOrInsert([
            'name' => 'Mercado'
        ]);
        Category::updateOrInsert([
            'name' => 'Posto'
        ]);
        Category::updateOrInsert([
            'name' => 'Boteco'
        ]);
        Category::updateOrInsert([
            'name' => 'Farmácia'
        ]);
        Category::updateOrInsert([
            'name' => 'Alimentação'
        ]);
        Category::updateOrInsert([
            'name' => 'Café'
        ]);
        Category::updateOrInsert([
            'name' => 'Moradia'
        ]);
        Category::updateOrInsert([
            'name' => 'Fixas'
        ]);
        Category::updateOrInsert([
            'name' => 'Carro'
        ]);
        Category::updateOrInsert([
            'name' => 'Outros'
        ]);
        Category::updateOrInsert([
            'name' => 'Manutenção'
        ]);
        Category::updateOrInsert([
            'name' => 'Abastecimento'
        ]);
        Category::updateOrInsert([
            'name' => 'Carro'
        ]);
        Category::updateOrInsert([
            'name' => 'Pessoal'
        ]);
    }
}