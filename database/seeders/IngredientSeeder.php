<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("食材の作成を開始します...");

        $json = file_get_contents(__DIR__ . '/ingredients.json');
        $categories = json_decode($json, true);

        
        
        $count = 0;
        foreach ($categories['categories'] as $category) {
            foreach($category['ingredients'] as $ingredient) {
                Ingredient::create([
                    'name' => $ingredient['name'],
                    'category' => $category['name']
                ]);
                $count++;
            }
        }

        $this->command->info("食材を{$count}件、作成しました。");
    }
}
