<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VM>
 */
class VMFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'SRV-' . fake()->domainWord(),
            'ip1' => fake()->localIpv4(),
            'services' => 'docker,apache2,mariadb',
            'operating_system_id' => fake()->numberBetween($min = 1, $max = 10),
            'remoteID' => fake()->numberBetween($min = 100000000, $max = 999999999),
            'remotePassword' => fake()->password($minLength = 10, $maxLength = 14),
        ];
    }
}
