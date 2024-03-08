<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = DB::table('recipes')->pluck('id')->toArray();

        foreach($recipes as $recipe) {
            $numberOfSteps = rand(3, 6);

            for($i = 0; $i <= $numberOfSteps; $i++) {
                DB::table('steps')->insert([
                    'recipe_id' => $recipe,
                    'step_number'=> $i,
                    'description'=> 'Steps' . $i . 'description for recipe ' . $recipe,
                    'created_at'=>now(),
                    'updated_at'=>now()
                ]);
            }
        }
    }
}
