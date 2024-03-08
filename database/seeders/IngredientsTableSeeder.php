<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   // recipes テーブルからすべてのレシピIDを配列として取得
        $recipes = DB::table('recipes')->pluck('id')->toArray();
        $ingredient_names = ['Salt', 'Sugar', 'Flour', 'Eggs', 'Milk', 'Butter', 'Oil', 'Pepper', 'Baking powder', 'Cocoa Powder'];
        foreach($recipes as $recipe) {
            for($i=0; $i < rand(2, 5); $i++) {
                DB::table('ingredients')->insert([
                    'recipe_id' =>$recipe,
                    'name' => $ingredient_names[array_rand($ingredient_names)],
                    'quantity' => rand(1, 500) . 'g',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
