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
            'image' => 'bNx5EaZ9rpRlenLrxPYZXG05wI1lfrokj2ny9o9j.jpg',
            'description' => 'Super lekker',
            'highlighted' => 0,
        ]);

        \App\Models\Dishes::factory()->create([
            'name' => 'Vlees',
            'image' => 'gE22cRiqsppg4miO9D2J8uTBXFqUJjnDuet3OLLu.jpg',
            'description' => 'Super lekker en beter dan Sushi',
            'highlighted' => 1,
        ]);

        \App\Models\Dishes::factory()->create([
            'name' => 'Saté',
            'image' => 'oxmuDUtzJNDIJWm5MEQlJdFttq1xi37FZ22w0RFv.jpg',
            'description' => 'Lekker bruin',
            'highlighted' => 1,
        ]);

        \App\Models\Dishes::factory()->create([
            'name' => 'Buffet',
            'image' => 'qHrxZT2wqA9I9YeR9WXN4JkJXwSCDJxGqHrGj7fS.jpg',
            'description' => 'Inclusief metalen bakken',
            'highlighted' => 0,
        ]);

        \App\Models\Dishes::factory()->create([
            'name' => 'Buffet (weer)',
            'image' => 'rJAWLQXKJ4GowtNcytwgWHEp7hRfNPq4IBAEzd2q.jpg',
            'description' => 'Inclusief EXTRA metalen bakken',
            'highlighted' => 0,
        ]);

        \App\Models\Ingredients::factory()->create([
            'name' => 'kip',
        ]);
        \App\Models\Ingredients::factory()->create([
            'name' => 'varken',
        ]);
        \App\Models\Ingredients::factory()->create([
            'name' => 'mayonaise',
        ]);
        \App\Models\Ingredients::factory()->create([
            'name' => 'aardappel',
        ]);
        \App\Models\Ingredients::factory()->create([
            'name' => 'tomaat',
        ]);
        \App\Models\Ingredients::factory()->create([
            'name' => 'prei',
        ]);
        \App\Models\Ingredients::factory()->create([
            'name' => 'rund',
        ]);
        \App\Models\Ingredients::factory()->create([
            'name' => 'selderij',
        ]);

        \App\Models\Dish_Ingredient::factory(20)->create();

        \App\Models\Reservation::factory(10)->create();
    }
}
