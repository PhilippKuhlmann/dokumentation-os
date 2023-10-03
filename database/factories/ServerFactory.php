<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Server>
 */
class ServerFactory extends Factory
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
            'manufacturer' => fake()->company(),
            'model' => fake()->ean8(),
            'serialNumber' => fake()->ean13(),
            'ip1' => fake()->localIpv4(),
            'bmcIp' => fake()->localIpv4(),
            'bmcUser' => 'root',
            'bmcPassword' => fake()->password($minLength = 6, $maxLength = 14),
            'services' => 'Hyper-V,DNS,AD',
            'operating_system_id' => fake()->numberBetween($min = 1, $max = 10),
            'remoteID' => fake()->numberBetween($min = 100000000, $max = 999999999),
            'remotePassword' => fake()->password($minLength = 10, $maxLength = 14),
        ];
    }
}
