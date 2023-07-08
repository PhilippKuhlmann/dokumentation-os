<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SecurepointUTM>
 */
class SecurepointUTMFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'utm01.' . fake()->domainName(),
            'type' => 'VM',
            'username' => 'admin',
            'password' => fake()->password($minLength = 6, $maxLength = 12),
            'cloudBackupPassword' => fake()->password($minLength = 6, $maxLength = 12),
            'ip' => '192.168.175.1',
            'urlAdmin' => 'https://192.168.175.1:11115',
            'urlUser' => 'https://192.168.175.1',
        ];
    }
}
