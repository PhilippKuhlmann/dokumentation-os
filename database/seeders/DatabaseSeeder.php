<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
            'id' => 99,
            'name' => 'Kunde',
        ]);


        \App\Models\User::factory()->create([
            'name' => 'Philipp Kuhlmann',
            'username' => 'p.kuhlmann',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);

        $customer = \App\Models\Customer::factory()->create([
            'name' => 'Mustermann',
            'slug' => 'mustermann',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Max Mustermann',
            'username' => 'max',
            'password' => bcrypt('password'),
            'role_id' => 99,
            'customer_id' => $customer->id,
        ]);

        \App\Models\Customer::factory(20)->create();

        \App\Models\Network::factory(10)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\ADUser::factory(10)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\ADGroup::factory(5)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\Server::factory(3)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\VM::factory(5)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\LoginWebsite::factory(5)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\PhoneSystem::factory(3)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\Phone::factory(20)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\Mailbox::factory(10)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\Wifi::factory(4)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\Computer::factory(10)->create([
            'customer_id' => $customer->id,
        ]);


        $customer = \App\Models\Customer::factory()->create([
            'name' => 'Kuhlmann',
            'slug' => 'kuhlmann',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Kuhlmann Mustermann',
            'username' => 'philipp',
            'password' => bcrypt('password'),
            'role_id' => 99,
            'customer_id' => $customer->id,
        ]);




        $this->call([
            ServerOperatingSystemsSeeder::class,
            MailboxProvidorsSeeder::class,
        ]);
    }
}
