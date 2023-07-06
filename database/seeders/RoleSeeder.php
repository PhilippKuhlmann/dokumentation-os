<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::factory()->create([
            'id' => 1,
            'name' => 'Admin',
        ]);

        \App\Models\Role::factory()->create([
            'id' => 2,
            'name' => 'Techniker',
        ]);

        \App\Models\Role::factory()->create([
            'id' => 98,
            'name' => 'Kunde R',
        ]);

        \App\Models\Role::factory()->create([
            'id' => 99,
            'name' => 'Kunde RW',
        ]);
    }
}
