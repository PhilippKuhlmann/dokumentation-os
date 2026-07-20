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
            'model' => fake()->randomElement(['TERRA PC-Business', 'EliteDesk 800 G9', 'ThinkCentre M70q', 'OptiPlex 7010']),
            'serialNumber' => fake()->ean13(),
            'ip' => fake()->localIpv4(),
            'operating_system_id' => fake()->numberBetween($min = 1, $max = 10),
        ];
    }
}
