<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NAS>
 */
class NASFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'NAS-' . fake()->domainWord(),
            'manufacturer' => fake()->company(),
            'model' => fake()->ean8(),
            'serialNumber' => fake()->ean13(),
            'ip1' => fake()->localIpv4(),
            'port' => '80',
            'username' => 'admin',
            'password' => fake()->password($minLength = 6, $maxLength = 14),
        ];
    }
}
