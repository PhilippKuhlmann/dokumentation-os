<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RackDevicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\RackDevice::factory()->create([
            'name' => 'Blindplatte 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'blindplatte_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Blindplatte 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'blindplatte_2HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Blindplatte 3HE',
            'u' => 3,
            'fillable' => false,
            'html' => 'blindplatte_3HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Kabeldurchführung',
            'u' => 1,
            'fillable' => false,
            'html' => 'durchfuehrungspanel_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Fachboden 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'fachboden_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Fachboden 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'fachboden_2HE.svg',
        ]);

        // LWL LC
        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL LC Patchfeld 8 Port 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'LWL_LCpatchfeld_8_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL LC Patchfeld 8 Port 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'LWL_LCpatchfeld_8_2HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL LC Patchfeld 12 Port 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'LWL_LCpatchfeld_12_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL LC Patchfeld 12 Port 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'LWL_LCpatchfeld_12_2HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL LC Patchfeld 24 Port 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'LWL_LCpatchfeld_24_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL LC Patchfeld 24 Port 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'LWL_LCpatchfeld_24_2HE.svg',
        ]);

        // LWL SC
        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL SC Patchfeld 8 Port 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'LWL_SCpatchfeld_8_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL SC Patchfeld 8 Port 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'LWL_SCpatchfeld_8_2HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL SC Patchfeld 12 Port 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'LWL_SCpatchfeld_12_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL SC Patchfeld 12 Port 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'LWL_SCpatchfeld_12_2HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL SC Patchfeld 24 Port 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'LWL_SCpatchfeld_24_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL SC Patchfeld 24 Port 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'LWL_SCpatchfeld_24_2HE.svg',
        ]);

        // LWL ST
        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL ST Patchfeld 8 Port 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'LWL_STpatchfeld_8_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL ST Patchfeld 8 Port 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'LWL_STpatchfeld_8_2HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL ST Patchfeld 12 Port 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'LWL_STpatchfeld_12_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL ST Patchfeld 12 Port 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'LWL_STpatchfeld_12_2HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL ST Patchfeld 24 Port 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'LWL_STpatchfeld_24_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'LWL ST Patchfeld 24 Port 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'LWL_STpatchfeld_24_2HE.svg',
        ]);


        \App\Models\RackDevice::factory()->create([
            'name' => 'Patchfeld 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'patchfeld_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Rangierfeld 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'rangierfeld_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Schublade 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'schublade_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Schublade 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'schublade_2HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Schublade 3HE',
            'u' => 3,
            'fillable' => false,
            'html' => 'schublade_3HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Server 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'Server_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Server 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'Server_2HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Server 3HE',
            'u' => 3,
            'fillable' => false,
            'html' => 'Server_3HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Server 4HE',
            'u' => 4,
            'fillable' => false,
            'html' => 'Server_4HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Server 5HE',
            'u' => 5,
            'fillable' => false,
            'html' => 'Server_5HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Steckdosen 6-Fach 1HE',
            'u' => 1,
            'fillable' => true,
            'model' => 'steckdose',
            'html' => 'steckdosen_6_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Steckdosen 7-Fach 1HE',
            'u' => 1,
            'fillable' => true,
            'model' => 'steckdose',
            'html' => 'steckdosen_7_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Steckdosen 8-Fach 1HE',
            'u' => 1,
            'fillable' => true,
            'model' => 'steckdose',
            'html' => 'steckdosen_8_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Steckdosen 9-Fach 1HE',
            'u' => 1,
            'fillable' => true,
            'model' => 'steckdose',
            'html' => 'steckdosen_9_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Switch 8 Port 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'switch_8_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Switch 16 Port 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'switch_16_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Switch 24 Port 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'switch_24_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Switch 48 Port 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'switch_48_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Telefonanlage 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'telefonanlage_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Telefonanlage 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'telefonanlage_2HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'USV 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'USV_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'USV 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'USV_2HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Firewall 1HE',
            'u' => 1,
            'fillable' => false,
            'html' => 'firewall_1HE.svg',
        ]);

        \App\Models\RackDevice::factory()->create([
            'name' => 'Firewall 2HE',
            'u' => 2,
            'fillable' => false,
            'html' => 'firewall_2HE.svg',
        ]);

    }
}
