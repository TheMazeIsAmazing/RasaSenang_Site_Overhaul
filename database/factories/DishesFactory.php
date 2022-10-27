<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dishes>
 */
class DishesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'image'=> 'images/sushi-flamberen.png',
            'description'=> fake()->paragraph(3),
            'highlighted' => fake()->numberBetween(0,1),
        ];
    }
}
