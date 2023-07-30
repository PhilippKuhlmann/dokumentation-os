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
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);

        $customer = \App\Models\Customer::factory()->create([
            'name' => 'Mustermann',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Max RW',
            'username' => 'maxrw',
            'password' => bcrypt('password'),
            'role_id' => 99,
            'customer_id' => $customer->id,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Max R',
            'username' => 'maxr',
            'password' => bcrypt('password'),
            'role_id' => 98,
            'customer_id' => $customer->id,
        ]);

        \App\Models\ADDomain::factory()->create([
            'domain' => 'ad.mustermann.de',
            'netbios' => 'MUSTERMANN',
            'dsrmpassword' => 'password',
            'customer_id' => $customer->id,
        ]);

        \App\Models\SecurepointUTM::factory(1)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\SecurepointUMA::factory(1)->create([
            'customer_id' => $customer->id,
        ]);

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

        \App\Models\NAS::factory(3)->create([
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

        \App\Models\Printer::factory(10)->create([
            'customer_id' => $customer->id,
        ]);



        $this->call([
            OperatingSystemsSeeder::class,
            MailboxProvidorsSeeder::class,
        ]);
    }
}
