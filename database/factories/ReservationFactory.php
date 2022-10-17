<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => fake()->date(),
            'time' => fake()->time(),
            'name' => fake()->name(),
            'people' => fake()->numberBetween(1,100),
            'email_address'=> fake()->email(),
            'phone_number'=> fake()->phoneNumber(),
        ];
    }
}
