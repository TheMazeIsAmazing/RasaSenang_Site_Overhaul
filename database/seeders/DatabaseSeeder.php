<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(1)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test Admin User',
             'email' => 'meesmuller@outlook.com',
             'password' => '$2y$10$yPzsquHNkL1FyMlZCv9ST.N/RIlNDVJHaa4B7dkvmTkQBQHFdj7rC',
             'role' => 0
         ]);


        \App\Models\User::factory()->create([
            'name' => 'Test Normal User',
            'email' => 'takodebeer88@gmail.com',
            'password' => '$2y$10$yPzsquHNkL1FyMlZCv9ST.N/RIlNDVJHaa4B7dkvmTkQBQHFdj7rC',
            'role' => 1
        ]);

        \App\Models\Dishes::factory()->create([
            'name' => 'Sushi',
            'image' => 'images/sushi-flamberen.jpg',
            'description' => 'Super lekker en beter',
            'highlighted' => 0,
        ]);

        \App\Models\Dishes::factory()->create([
            'name' => 'Vlees',
            'image' => 'images/indonesisch-vleesgerecht.jpg',
            'description' => 'Super lekker en beter dan Sushi',
            'highlighted' => 1,
        ]);

        \App\Models\Dishes::factory()->create([
            'name' => 'Saté',
            'image' => 'images/indonesische-sate.jpg',
            'description' => 'Lekker bruin',
            'highlighted' => 1,
        ]);

        \App\Models\Dishes::factory()->create([
            'name' => 'Buffet',
            'image' => 'images/buffet.jpg',
            'description' => 'Inclusief metalen bakken',
            'highlighted' => 0,
        ]);

        \App\Models\Dishes::factory()->create([
            'name' => 'Buffet (weer)',
            'image' => 'images/allyoucaneat.jpg',
            'description' => 'Inclusief EXTRA metalen bakken',
            'highlighted' => 0,
        ]);

//        \App\Models\Reservation::factory()->create([
//            'name' => 'Test Normal User',
//            'email' => 'takodebeer88@gmail.com',
//            'date' => '2022-12-01'
//        ]);

        \App\Models\Reservation::factory(10)->create();
    }
}
