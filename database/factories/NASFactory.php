<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NASFactory extends Factory
{
    protected $model = \App\Models\NAS::class;

    public function definition()
    {
        [$manufacturer, $model] = fake()->randomElement([
            ['Synology', 'DS1821+'],
            ['Synology', 'DS923+'],
            ['Synology', 'RS1221+'],
            ['QNAP', 'TS-873A'],
            ['QNAP', 'TVS-h874'],
        ]);

        return [
            'name' => 'NAS-' . fake()->randomElement(['Backup', 'Archiv', 'Kameras', 'Fileserver']),
            'manufacturer' => $manufacturer,
            'model' => $model,
            'serialNumber' => strtoupper(fake()->bothify('????########')),
            'ip1' => fake()->localIpv4(),
            'port' => '5001',
            'username' => 'admin',
            'password' => fake()->password(8, 14),
        ];
    }
}
