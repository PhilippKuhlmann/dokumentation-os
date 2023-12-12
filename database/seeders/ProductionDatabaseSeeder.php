<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\OperatingSystemsSeeder;
use Database\Seeders\MailboxProvidorsSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            PermissionRoleSeeder::class,
            OperatingSystemsSeeder::class,
            MailboxProvidorsSeeder::class,
        ]);
    }
}
