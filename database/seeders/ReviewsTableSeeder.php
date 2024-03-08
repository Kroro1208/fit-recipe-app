<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = DB::table('recipes')->pluck('id')->toArray();
        $users = DB::table('users')->pluck('id')->toArray();
        $comments = [
            "This recipe is a game changer! So easy to make and incredibly delicious",
            "I never thought I could cook something this good. Thank you for making me feel like a chef!",
            "Made this for dinner last night and it was a hit! Everyone asked for seconds.",
            "I've tried several recipes before, but this one is by far the best. Perfect balance of flavors.",
            "Absolutely love this recipe! It's now a staple in my household.",
            "I was a bit skeptical at first, but I'm so glad I tried it. Truly amazing!",
            "This recipe is not only delicious but also so simple to follow. A must-try for anyone!",
            "Wow, just wow. I'm blown away by how good this tastes. Well done!",
            "I appreciate how this recipe caters to different dietary needs without compromising on taste.",
            "The perfect recipe for when you want to impress someone. It worked wonders for me!"
        
        ];

        foreach($recipes as $recipe) {
            for($i=0; $i < rand(1, 3); $i++) {
                DB::table('reviews')->insert([
                    'user_id' => $users[array_rand($users)],
                    'recipe_id' => $recipe,
                    'rating'=>rand(1, 5),
                    'comment' => $comments[array_rand($comments)],
                    'created_at'=>now(),
                    'updated_at'=>now()
                ]);
            }
        }

    }
}
