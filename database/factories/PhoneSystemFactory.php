<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhoneSystem>
 */
class PhoneSystemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'manufacturer' => fake()->randomElement(['reventix', '3cx', 'Panasonic']),
            'model' => fake()->ean8(),
            'serialNumber' => fake()->ean13(),
            'ip1' => fake()->localIpv4(),
            'port' => '443',
            'username' => fake()->userName(),
            'password' => fake()->password($minLength = 6, $maxLength = 12),
        ];
    }
}
