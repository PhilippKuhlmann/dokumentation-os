<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocalDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
        ]);

        $this->call([
            PermissionRoleSeeder::class,
            UserSeeder::class,
            OperatingSystemsSeeder::class,
            MailboxProvidorsSeeder::class,
            RackDevicesSeeder::class,
        ]);

        $customer = \App\Models\Customer::factory()->create([
            'name' => 'Mustermann',
        ]);

        $site1 = \App\Models\Site::factory()->create([
            'customer_id' => $customer->id,
            'name' => 'Zentrale Hamburg',
        ]);

        $site2 = \App\Models\Site::factory()->create([
            'customer_id' => $customer->id,
            'name' => 'Filiale München',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Max RW',
            'username' => 'maxrw',
            'password' => bcrypt('password'),
            'role_id' => Role::where('name', 'general_full')->firstOrFail()->id,
            'customer_id' => $customer->id,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Max R',
            'username' => 'maxr',
            'password' => bcrypt('password'),
            'role_id' => Role::where('name', 'general_read')->firstOrFail()->id,
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
            'name' => 'Reddoxx Mailserver',
            'manufacturer' => 'Reddoxx',
            'type' => 'Appliance',
        ]);

        \App\Models\Network::factory(5)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\Network::factory(3)->create([
            'customer_id' => $customer->id,
            'site_id' => $site2->id,
        ]);

        // Kohärentes Management-VLAN mit passend adressierten Geräten (für einen
        // aussagekräftigen IP-Plan: Gateway, Server, DHCP-Bereich, freie Bereiche).
        \App\Models\Network::factory()->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
            'description' => 'Server & Management',
            'vlanId' => 30,
            'network' => '10.10.30.0',
            'cidr' => '24',
            'subnetmask' => '255.255.255.0',
            'gateway' => '10.10.30.1',
            'dns1' => '10.10.30.10',
            'dns2' => '8.8.8.8',
            'dhcpStart' => '100',
            'dhcpEnd' => '200',
        ]);

        // Clients-VLAN (der Router ist auch hier Gateway -> zweite IP)
        $clientsVlan = \App\Models\Network::factory()->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
            'description' => 'Clients',
            'vlanId' => 20,
            'network' => '10.10.20.0',
            'cidr' => '24',
            'subnetmask' => '255.255.255.0',
            'gateway' => '10.10.20.1',
            'dhcpStart' => '100',
            'dhcpEnd' => '200',
        ]);

        $rtrCore = \App\Models\Router::factory()->create(['customer_id' => $customer->id, 'site_id' => $site1->id, 'name' => 'RTR-Core', 'ip' => '10.10.30.1']);
        // Router hängt in mehreren VLANs -> zusätzliche Gateway-IP im Clients-VLAN
        $rtrCore->ipAddresses()->create(['customer_id' => $customer->id, 'network_id' => $clientsVlan->id, 'address' => '10.10.20.1', 'label' => 'Gateway Clients']);

        \App\Models\NetworkSwitch::factory()->create(['customer_id' => $customer->id, 'site_id' => $site1->id, 'name' => 'SW-Core', 'ip' => '10.10.30.2']);
        // ein Client im Clients-VLAN, damit dort auch etwas belegt ist
        \App\Models\Computer::factory()->create(['customer_id' => $customer->id, 'site_id' => $site1->id, 'name' => 'PC-Empfang', 'ip' => '10.10.20.50']);
        \App\Models\Server::factory()->create(['customer_id' => $customer->id, 'site_id' => $site1->id, 'name' => 'SRV-DC01', 'ip1' => '10.10.30.10', 'bmcIp' => '10.10.30.210']);
        \App\Models\Server::factory()->create(['customer_id' => $customer->id, 'site_id' => $site1->id, 'name' => 'SRV-FS01', 'ip1' => '10.10.30.11', 'bmcIp' => '10.10.30.211']);
        \App\Models\Server::factory()->create(['customer_id' => $customer->id, 'site_id' => $site1->id, 'name' => 'SRV-HV01', 'ip1' => '10.10.30.12', 'bmcIp' => '10.10.30.212']);
        \App\Models\NAS::factory()->create(['customer_id' => $customer->id, 'site_id' => $site1->id, 'name' => 'NAS-Backup', 'ip1' => '10.10.30.20']);
        \App\Models\Accesspoint::factory()->create(['customer_id' => $customer->id, 'site_id' => $site1->id, 'name' => 'AP-Serverraum', 'ip' => '10.10.30.30']);

        \App\Models\ADUser::factory(10)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\ADGroup::factory(5)->create([
            'customer_id' => $customer->id,
        ]);

        // Server – Referenzen für die VM-Hosts merken
        $servers = \App\Models\Server::factory(3)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        // VMs, jeweils einem physischen Host-Server zugeordnet
        \App\Models\VM::factory(6)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ])->each(function ($vm) use ($servers) {
            $vm->update(['server_id' => $servers->random()->id]);
        });

        // NAS – für die NAS-Logins gemerkt
        $nasList = \App\Models\NAS::factory(2)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\NetworkSwitch::factory(4)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\Accesspoint::factory(5)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\Computer::factory(12)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\Printer::factory(4)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\IoTDevice::factory(4)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\Machine::factory(3)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\OtherClient::factory(3)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\PhoneSystem::factory(1)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\Phone::factory(12)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\DECT::factory(5)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\Mailbox::factory(6)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\Wifi::factory(4)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        // Recorder – für die Recorder-Logins gemerkt
        $recorders = \App\Models\Recorder::factory(2)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\Camera::factory(12)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        \App\Models\ContactPerson::factory(3)->create([
            'customer_id' => $customer->id,
        ]);

        // Logins
        \App\Models\LoginGeneral::factory(6)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\LoginWebsite::factory(6)->create([
            'customer_id' => $customer->id,
        ]);

        foreach ($nasList as $nas) {
            \App\Models\LoginNAS::factory(2)->create([
                'customer_id' => $customer->id,
                'nas_id' => $nas->id,
            ]);
        }

        foreach ($recorders as $recorder) {
            \App\Models\LoginRecorder::factory(1)->create([
                'customer_id' => $customer->id,
                'recorder_id' => $recorder->id,
            ]);
        }

        // Lizenzen
        \App\Models\LicenseWindows::factory(8)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\LicenseSoftware::factory(6)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\LicenseAccess::factory(3)->create([
            'customer_id' => $customer->id,
        ]);

        // Dienste
        \App\Models\FTPServer::factory(2)->create([
            'customer_id' => $customer->id,
        ]);

        \App\Models\DynDNS::factory(1)->create([
            'customer_id' => $customer->id,
        ]);

        // Internet-Anschlüsse je Standort
        \App\Models\InternetConnection::factory()->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
            'provider' => 'Deutsche Telekom',
            'product' => 'DeutschlandLAN Glasfaser 1000',
            'connection_type' => 'Glasfaser',
            'bandwidth_down' => '1000 Mbit/s',
            'bandwidth_up' => '500 Mbit/s',
        ]);

        \App\Models\InternetConnection::factory()->create([
            'customer_id' => $customer->id,
            'site_id' => $site2->id,
            'provider' => 'Vodafone',
            'product' => 'Business Kabel 500',
            'connection_type' => 'Kabel',
            'bandwidth_down' => '500 Mbit/s',
            'bandwidth_up' => '50 Mbit/s',
        ]);

        // USV
        \App\Models\Ups::factory(2)->create([
            'customer_id' => $customer->id,
            'site_id' => $site1->id,
        ]);

        // Domains (eine läuft demnächst ab -> Dashboard-Warnung)
        \App\Models\Domain::factory()->create([
            'customer_id' => $customer->id,
            'name' => 'mustermann.de',
            'registrar' => 'IONOS',
            'expiry_date' => now()->addMonths(4)->toDateString(),
            'nameserver1' => 'ns1.ionos.de',
            'nameserver2' => 'ns2.ionos.de',
        ]);

        \App\Models\Domain::factory()->create([
            'customer_id' => $customer->id,
            'name' => 'mustermann-gmbh.de',
            'registrar' => 'united-domains',
            'expiry_date' => now()->addYear()->toDateString(),
        ]);

        // SSL/TLS-Zertifikate (eines läuft demnächst ab -> Dashboard-Warnung)
        \App\Models\Certificate::factory()->create([
            'customer_id' => $customer->id,
            'name' => 'Wildcard *.mustermann.de',
            'common_name' => '*.mustermann.de',
            'issuer' => "Let's Encrypt",
            'type' => 'Wildcard',
            'issued_date' => now()->subMonths(2)->toDateString(),
            'expiry_date' => now()->addWeeks(3)->toDateString(),
        ]);

        \App\Models\Certificate::factory()->create([
            'customer_id' => $customer->id,
            'name' => 'mail.mustermann.de',
            'common_name' => 'mail.mustermann.de',
            'issuer' => 'Sectigo',
            'type' => 'SSL/TLS',
            'issued_date' => now()->subMonths(1)->toDateString(),
            'expiry_date' => now()->addYear()->toDateString(),
        ]);

        // Backup-Konzepte
        \App\Models\Backup::factory()->create([
            'customer_id' => $customer->id,
            'name' => 'Veeam – VMs täglich',
            'software' => 'Veeam Backup & Replication',
            'source' => 'Hyper-V (alle VMs)',
            'destination' => 'NAS-Backup',
            'schedule' => 'täglich 22:00',
            'retention' => '30 Tage',
            'last_success' => now()->subDay()->toDateString(),
        ]);

        \App\Models\Backup::factory()->create([
            'customer_id' => $customer->id,
            'name' => 'Cloud-Backup Fileserver',
            'software' => 'Synology Hyper Backup',
            'source' => 'NAS-Fileserver',
            'destination' => 'Wasabi Cloud',
            'schedule' => 'täglich 01:00',
            'retention' => '90 Tage',
            'last_success' => now()->toDateString(),
        ]);


        $this->call([
            CustomerSeeder::class,
        ]);
    }
}
