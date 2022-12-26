<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phone>
 */
class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'extension' => fake()->numberBetween($min = 10, $max = 99),
            'manufacturer' => fake()->randomElement(['Yealink', 'Snom', 'Panasonic', 'Fanvil']),
            'model' => fake()->ean8(),
            'serialNumber' => fake()->ean13(),
            'ip' => fake()->localIpv4(),
            'mac' => fake()->macAddress(),
            'port' => '443',
            'username' => fake()->userName(),
            'password' => fake()->password(),
        ];
    }
}
