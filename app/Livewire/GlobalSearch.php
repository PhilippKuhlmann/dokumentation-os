<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class GlobalSearch extends Component
{
    public $search;

    protected $queryString = ['search'];

    /**
     * Durchsuchbare Typen: Slug => [Model, Anzeigename, Permission-Prefix, Suchspalten].
     * Die Spalten sind gegen die Migrationen verifiziert (ip vs. ip1 etc.).
     */
    protected const TYPES = [
        'server' => [\App\Models\Server::class, 'Server', 'server', ['name', 'ip1', 'ip2', 'serialNumber']],
        'vm' => [\App\Models\VM::class, 'VMs', 'vm', ['name', 'ip1', 'ip2']],
        'nas' => [\App\Models\NAS::class, 'NAS', 'nas', ['name', 'ip1', 'ip2', 'serialNumber']],
        'computer' => [\App\Models\Computer::class, 'Computer', 'computer', ['name', 'ip', 'serialNumber']],
        'printer' => [\App\Models\Printer::class, 'Drucker', 'printer', ['name', 'ip', 'serialNumber']],
        'camera' => [\App\Models\Camera::class, 'Kameras', 'camera', ['name', 'ip', 'serialNumber']],
        'recorder' => [\App\Models\Recorder::class, 'Recorder', 'recorder', ['name', 'ip', 'serialNumber']],
        'phone' => [\App\Models\Phone::class, 'Telefone', 'phone', ['ip', 'serialNumber', 'mac']],
        'dect' => [\App\Models\DECT::class, 'DECT', 'dect', ['ip', 'serialNumber', 'mac']],
        'phonesystem' => [\App\Models\PhoneSystem::class, 'TK-Anlagen', 'phonesystem', ['ip1', 'serialNumber']],
        'networkswitch' => [\App\Models\NetworkSwitch::class, 'Switches', 'networkswitch', ['name', 'ip', 'serialNumber']],
        'accesspoint' => [\App\Models\Accesspoint::class, 'Accesspoints', 'accesspoint', ['name', 'ip', 'serialNumber']],
        'router' => [\App\Models\Router::class, 'Router', 'router', ['name', 'ip', 'serialNumber']],
        'wifi' => [\App\Models\Wifi::class, 'WLAN', 'wifi', ['ssid']],
        'iotdevice' => [\App\Models\IoTDevice::class, 'IoT-Geräte', 'iotdevice', ['name', 'ip', 'serialNumber']],
        'machine' => [\App\Models\Machine::class, 'Maschinen', 'machine', ['name', 'ip']],
        'otherclient' => [\App\Models\OtherClient::class, 'Sonstige Clients', 'otherclient', ['name', 'ip', 'serialNumber']],
        'ups' => [\App\Models\Ups::class, 'USV', 'ups', ['name', 'ip', 'serialNumber']],
        'internetconnection' => [\App\Models\InternetConnection::class, 'Internet / WAN', 'internetconnection', ['wan_ip']],
        'domain' => [\App\Models\Domain::class, 'Domains', 'domain', ['name']],
        'certificate' => [\App\Models\Certificate::class, 'Zertifikate', 'certificate', ['name', 'common_name', 'issuer']],
    ];

    public function render()
    {
        $groups = collect();

        if (strlen((string) $this->search) >= 2) {
            $term = '%' . addcslashes($this->search, '%_') . '%';
            $user = auth()->user();

            foreach (self::TYPES as $slug => [$class, $label, $permission, $columns]) {
                if (! Gate::allows($permission . '_viewAny')) {
                    continue;
                }

                $query = $class::query()->with('customer');

                // Kunden-Nutzer sehen nur Objekte des eigenen Kunden
                if ($user->customer_id) {
                    $query->where('customer_id', $user->customer_id);
                }

                $query->where(function ($q) use ($columns, $term) {
                    foreach ($columns as $column) {
                        $q->orWhere($column, 'like', $term);
                    }
                });

                $results = $query->limit(20)->get();

                if ($results->isNotEmpty()) {
                    $groups->push([
                        'slug' => $slug,
                        'label' => $label,
                        'results' => $results,
                    ]);
                }
            }
        }

        return view('livewire.global-search', ['groups' => $groups])
            ->layout('layouts.empty', ['title' => 'Globale Suche']);
    }
}
