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
            'name' => fake()->domainWord(),
            'manufacturer' => fake()->company(),
            'model' => fake()->ean8(),
            'serialNumber' => fake()->ean13(),
            'ip1' => fake()->localIpv4(),
            'bmcIp' => fake()->localIpv4(),
            'bmcUser' => 'root',
            'bmcPassword' => fake()->password(),
            'services' => ['Hyper-V', 'DNS', 'AD'],
            'server_operating_system_id' => fake()->numberBetween($min = 1, $max = 10),
        ];
    }
}
