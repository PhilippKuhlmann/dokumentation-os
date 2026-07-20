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
            'name' => 'Techniker',
            'username' => 'techniker',
            'email' => 'techniker@example.com',
            'password' => bcrypt('password'),
            'role_id' => Role::IS_TECHNIKER,
        ]);
    }
}
