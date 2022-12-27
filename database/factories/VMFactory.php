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
            'name' => fake()->domainWord(),
            'ip1' => fake()->localIpv4(),
            'services' => 'docker,apache2,mariadb',
            'server_operating_system_id' => fake()->numberBetween($min = 1, $max = 10),
        ];
    }
}
