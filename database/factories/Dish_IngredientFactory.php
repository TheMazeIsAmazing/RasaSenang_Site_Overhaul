<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish_Ingredient>
 */
class Dish_IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dish_id' => fake()->numberBetween(1,5),
            'ingredient_id'=> fake()->numberBetween(1,8),
        ];
    }
}
