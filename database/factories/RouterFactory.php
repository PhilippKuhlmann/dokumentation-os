<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Router>
 */
class RouterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->domainName(),
            'manufacturer' => fake()->randomElement(['TP-Link', 'Netgear', 'Unifi']),
            'model' => 'TP1245',
            'username' => 'admin',
            'password' => fake()->password($minLength = 6, $maxLength = 12),
            'ip' => '192.168.175.1',
            'port' => '443',
        ];
    }
}
