<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperatingSystemsSeeder extends Seeder
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
            'Windows Server 2012 R2 Standard',
            'Windows Server 2012 R2 Datacenter',

            'Debian 11',
            'Debian 10',
            'Debian 9',

            'Rangee OS',

            'Windows 10 Pro',
            'Windows 11 Pro',
            'Windows 7 Pro',

            'Windows 10 Home',
            'Windows 11 Home',
            'Windows 7 Home',
        ];

        foreach ($array as $a) {
            \App\Models\OperatingSystem::factory()->create([
                'name' => $a,
            ]);
        }

    }
}
