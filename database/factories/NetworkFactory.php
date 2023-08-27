<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Network>
 */
class NetworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => fake()->name(),
            'vlanId' => fake()->numberBetween(1, 254),
            'network' => fake()->localIpv4,
            'subnetmask' => '255.255.255.0',
            'cidr'=> '24',
            'gateway' => fake()->localIpv4,
            'dns1' => fake()->localIpv4,
            'dns2' => fake()->localIpv4,
            'dhcpStart'=> '100',
            'dhcpEnd'=> '250',
        ];
    }
}
