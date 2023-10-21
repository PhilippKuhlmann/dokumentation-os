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
            'password' => fake()->password($minLength = 6, $maxLength = 12),
            'network_id' => \App\Models\Network::inRandomOrder()->first()->id,
            'encryption' => fake()->randomElement(['WPA2', 'WPA3', 'offen']),
        ];
    }
}
