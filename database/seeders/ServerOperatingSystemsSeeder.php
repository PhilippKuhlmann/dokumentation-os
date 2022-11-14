<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServerOperatingSystemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            'Windows Server 2022 Standard',
            'Windows Server 2022 Datacenter',
            'Windows Server 2019 Standard',
            'Windows Server 2019 Datacenter',
            'Windows Server 2016 Standard',
            'Windows Server 2016 Datacenter',
            'Windows Server 2012 Standard',
            'Windows Server 2012 Datacenter',

            'Debian 11',
            'Debian 10',
            'Debian 9',
        ];

        foreach ($array as $a) {
            \App\Models\ServerOperatingSystem::factory()->create([
                'name' => $a,
            ]);
        }

    }
}
