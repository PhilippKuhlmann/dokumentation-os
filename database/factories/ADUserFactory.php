<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ADUser>
 */
class ADUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstName' => fake()->firstName($gender = 'male'|'female'),
            'lastName' => fake()->lastName(),
            'username' => fake()->userName(),
            'password' => fake()->password(),
        ];
    }
}
