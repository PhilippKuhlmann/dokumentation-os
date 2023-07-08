<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Website>
 */
class LoginWebsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->domainWord(),
            'username' => fake()->userName(),
            'password' => fake()->password($minLength = 6, $maxLength = 12),
            'url' => 'https://example.com',
        ];
    }
}
