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

        $site1 = \App\Models\Site::factory()->create([
            'customer_id' => $customer->id,
            'name' => 'Island',
        ]);

        $site2 = \App\Models\Site::factory()->create([
            'customer_id' => $customer->id,
            'name' => 'Norwegen',
        ]);

        $customer2 = \App\Models\Customer::factory()->create([
            'name' => 'Kuhlmann',
        ]);

        $site3 = \App\Models\Site::factory()->create([
            'customer_id' => $customer2->id,
            'name' => 'main',
        ]);

        $site4 = \App\Models\Site::factory()->create([
            'customer_id' => $customer2->id,
            'name' => 'second',
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
            'site_id' => $site1->id,
        ]);

        \App\Models\Router::factory(2)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\SecurepointUMA::factory(1)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\Network::factory(5)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\Network::factory(3)->create([
            'customer_id' => $customer->id,
            'site_id' => $site2->id,
        ]);

        \App\Models\Network::factory(2)->create([
            'customer_id' => $customer2->id,
            'site_id' => $site3->id,
        ]);

        \App\Models\Network::factory(1)->create([
            'customer_id' => $customer2->id,
            'site_id' => $site4->id,
        ]);

        \App\Models\ADUser::factory(10)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\ADGroup::factory(5)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\Server::factory(3)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\VM::factory(5)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\NAS::factory(3)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\LoginWebsite::factory(5)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\PhoneSystem::factory(3)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\Phone::factory(10)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\Mailbox::factory(3)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\Wifi::factory(4)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\Computer::factory(3)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\Printer::factory(3)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\Recorder::factory(2)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\Camera::factory(10)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);



        $this->call([
            OperatingSystemsSeeder::class,
            MailboxProvidorsSeeder::class,
        ]);
    }
}
