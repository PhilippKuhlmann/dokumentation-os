<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wifi>
 */
class WifiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ssid' => fake()->domainWord(),
            'password' => fake()->password(),
            'vlan' => fake()->numberBetween($min = 10, $max = 4000),
            'encryption' => fake()->randomElement(['WPA2', 'WPA3', 'offen']),
        ];
    }
}
