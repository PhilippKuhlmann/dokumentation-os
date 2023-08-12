<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recorder>
 */
class RecorderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Recorder-' . fake()->randomElement(['Werkstatt', 'Hof']),
            'manufacturer' => fake()->randomElement(['UniFi', 'Hikvison', 'DLink']),
            'model' => fake()->ean8(),
            'serialNumber' => fake()->ean13(),
            'ip' => fake()->localIpv4,
            'port' => '80',
            'username' => fake()->userName(),
            'password' => fake()->password($minLength = 6, $maxLength = 12),
        ];
    }
}
