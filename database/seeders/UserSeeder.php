<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory()->create([
            'name' => 'Philipp Kuhlmann',
            'username' => 'p.kuhlmann',
            'email' => 'p.kuhlmann@stadel.info',
            'password' => bcrypt('password'),
            'role_id' => Role::IS_TECHNIKER,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Sem Stadel',
            'username' => 'sem',
            'email' => 'sem@stadel.info',
            'password' => bcrypt('password'),
            'role_id' => Role::IS_TECHNIKER,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Justin Schillmöller',
            'username' => 'j.schillmoeller',
            'email' => 'j.schillmoeller@stadel.info',
            'password' => bcrypt('password'),
            'role_id' => Role::IS_TECHNIKER,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Andreas Sieverding',
            'username' => 'andreas',
            'email' => 'a.sieverding@stadel.info',
            'password' => bcrypt('password'),
            'role_id' => Role::IS_TECHNIKER,
        ]);


    }
}
