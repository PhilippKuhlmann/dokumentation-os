<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Computer>
 */
class ComputerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'PC-' . fake()->numberBetween($min = 1, $max = 100),
            'manufacturer' => fake()->randomElement(['Wortmann', 'HP', 'Lenovo']),
            'model' => fake()->ean8(),
            'serialNumber' => fake()->ean13(),
            'ip' => fake()->localIpv4(),
            'operatingSystem' => fake()->randomElement(['Windows 10 Pro', 'Windows 11 Pro', 'Debian 11']),
        ];
    }
}
