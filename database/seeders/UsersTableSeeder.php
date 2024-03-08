<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();
        $image_types = ['man', 'woman', 'oldman', 'oldwoman', 'child'];
        
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'id' => Str::uuid(),
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => Hash::make('password123'),
            ]);
        }

        // $image_types = ['man', 'woman', 'oldman', ' oldwoman', 'child'];
        // $users = [
        //     ['id'=>Str::uuid(), 'name'=>'山縣尚弥', 'email'=> 'test@example.com', 'password'=>Hash::make('password123'), 'image'=>'http://source.unsplash.com/rondom?' . $image_types[array_rand($image_types)]],
        //     ['id'=>Str::uuid(), 'name'=>'田中彰', 'email'=> 'test2@example.com', 'password'=>Hash::make('password123'), 'image'=>'http://source.unsplash.com/rondom?' . $image_types[array_rand($image_types)]],
        //     ['id'=>Str::uuid(), 'name'=>'真島千春', 'email'=> 'test3@example.com', 'password'=>Hash::make('password123'), 'image'=>'http://source.unsplash.com/rondom?' . $image_types[array_rand($image_types)]],
        //     ['id'=>Str::uuid(), 'name'=>'秋吉和子', 'email'=> 'test4@example.com', 'password'=>Hash::make('password123'), 'image'=>'http://source.unsplash.com/rondom?' . $image_types[array_rand($image_types)]],
        //     ['id'=>Str::uuid(), 'name'=>'飯沼小吉', 'email'=> 'test5@example.com', 'password'=>Hash::make('password123'), 'image'=>'http://source.unsplash.com/rondom?' . $image_types[array_rand($image_types)]],
        //     ['id'=>Str::uuid(), 'name'=>'山田タカシ', 'email'=> 'test6@example.com', 'password'=>Hash::make('password123'), 'image'=>'http://source.unsplash.com/rondom?' . $image_types[array_rand($image_types)]],
        //     ['id'=>Str::uuid(), 'name'=>'福原仁', 'email'=> 'test7@example.com', 'password'=>Hash::make('password123'), 'image'=>'http://source.unsplash.com/rondom?' . $image_types[array_rand($image_types)]],
        //     ['id'=>Str::uuid(), 'name'=>'沼田王子', 'email'=> 'test8@example.com', 'password'=>Hash::make('password123'), 'image'=>'http://source.unsplash.com/rondom?' . $image_types[array_rand($image_types)]],
        //     ['id'=>Str::uuid(), 'name'=>'鷺沼信', 'email'=> 'test9@example.com', 'password'=>Hash::make('password123'), 'image'=>'http://source.unsplash.com/rondom?' . $image_types[array_rand($image_types)]],
        //     ['id'=>Str::uuid(), 'name'=>'道端道子', 'email'=> 'test10@example.com', 'password'=>Hash::make('password123'), 'image'=>'http://source.unsplash.com/rondom?' . $image_types[array_rand($image_types)]],

        // ];
        // foreach($users as $user) {
        //     DB::table('users')->insert($user);
        // }
        

    }
}
