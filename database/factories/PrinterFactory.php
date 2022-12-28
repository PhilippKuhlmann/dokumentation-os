<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Printer>
 */
class PrinterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'prt-' . fake()->numberBetween($min = 1, $max = 100),
            'manufacturer' => fake()->randomElement(['Brother', 'HP', 'Kyocera']),
            'model' => fake()->ean8(),
            'serialNumber' => fake()->ean13(),
            'ip' => fake()->localIpv4(),
            'port' => fake()->randomElement(['443', '80', '8080']),
            'username' => fake()->userName(),
            'password' => fake()->password(),
        ];
    }
}
