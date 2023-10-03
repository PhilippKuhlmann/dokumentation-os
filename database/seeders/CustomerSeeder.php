<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = \App\Models\Customer::factory(10)->create();

        foreach ($customers as $customer) {

            $site1 = \App\Models\Site::factory()->create([
                'customer_id' => $customer->id,
                'name' => 'Main',
            ]);

            $site2 = \App\Models\Site::factory()->create([
                'customer_id' => $customer->id,
                'name' => 'Second',
            ]);




            \App\Models\Server::factory(3)->create([
                'customer_id' => $customer->id,
                'site_id' => $site1->id,
            ]);

            \App\Models\VM::factory(5)->create([
                'customer_id' => $customer->id,
                'site_id' => $site1->id,
            ]);

            \App\Models\Server::factory(1)->create([
                'customer_id' => $customer->id,
                'site_id' => $site2->id,
            ]);

            \App\Models\VM::factory(3)->create([
                'customer_id' => $customer->id,
                'site_id' => $site2->id,
            ]);



            \App\Models\SecurepointUTM::factory(1)->create([
                'customer_id' => $customer->id,
                'site_id' => $site1->id,
            ]);

            \App\Models\SecurepointUTM::factory(1)->create([
                'customer_id' => $customer->id,
                'site_id' => $site2->id,
            ]);


        }


    }
}
