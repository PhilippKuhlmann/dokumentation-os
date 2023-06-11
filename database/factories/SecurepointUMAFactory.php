<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SecurepointUMA>
 */
class SecurepointUMAFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'uma.' . fake()->domainName(),
            'type' => 'VM',
            'username' => 'admin',
            'password' => fake()->password(),
            'encryptionkey' => fake()->password(),
            'ip' => '192.168.175.254',
            'urlAdmin' => 'https://192.168.175.254:11115',
            'urlUser' => 'https://192.168.175.254',
        ];
    }
}
