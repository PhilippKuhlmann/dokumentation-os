<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OperatingSystem;
use App\Models\Server;
use App\Models\VM;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Nimmt die von einem Proxmox-Host gemeldeten Daten entgegen und legt
     * den Host als Server sowie seine VMs/LXC-Container als VM-Einträge an
     * bzw. aktualisiert sie (Upsert über agent_identifier). Es wird nichts
     * gelöscht.
     */
    public function proxmox(Request $request)
    {
        $customer = $request->attributes->get('agentCustomer');
        $site = $request->attributes->get('agentSite');

        $data = $request->validate([
            'host.identifier' => ['required', 'string', 'max:255'],
            'host.hostname' => ['required', 'string', 'max:255'],
            'host.manufacturer' => ['nullable', 'string', 'max:255'],
            'host.model' => ['nullable', 'string', 'max:255'],
            'host.serial' => ['nullable', 'string', 'max:255'],
            'host.ip' => ['nullable', 'string', 'max:255'],
            'host.pve_version' => ['nullable', 'string', 'max:255'],
            'host.kernel' => ['nullable', 'string', 'max:255'],
            'host.cpu' => ['nullable', 'string', 'max:255'],
            'host.memory_gb' => ['nullable', 'numeric'],
            'host.storages' => ['nullable', 'array'],
            'host.storages.*.name' => ['nullable', 'string', 'max:255'],
            'host.storages.*.type' => ['nullable', 'string', 'max:255'],
            'host.storages.*.total_gb' => ['nullable', 'numeric'],
            'host.storages.*.used_gb' => ['nullable', 'numeric'],
            'guests' => ['nullable', 'array'],
            'guests.*.identifier' => ['required_with:guests', 'string', 'max:255'],
            'guests.*.name' => ['nullable', 'string', 'max:255'],
            'guests.*.vmid' => ['nullable', 'integer'],
            'guests.*.type' => ['nullable', 'string', 'max:32'],
            'guests.*.ostype' => ['nullable', 'string', 'max:64'],
            'guests.*.ip' => ['nullable', 'string', 'max:255'],
            'guests.*.status' => ['nullable', 'string', 'max:32'],
            'guests.*.cores' => ['nullable', 'integer'],
            'guests.*.memory_gb' => ['nullable', 'numeric'],
        ]);

        $host = $data['host'];

        $osName = $host['pve_version'] ?? null
            ? 'Proxmox VE '.$host['pve_version']
            : 'Proxmox VE';
        $os = OperatingSystem::firstOrCreate(['name' => $osName]);

        $server = Server::updateOrCreate(
            ['customer_id' => $customer->id, 'agent_identifier' => $host['identifier']],
            [
                'site_id' => $site->id,
                'operating_system_id' => $os->id,
                'name' => $host['hostname'],
                'manufacturer' => $host['manufacturer'] ?? null,
                'model' => $host['model'] ?? null,
                'ip1' => $host['ip'] ?? null,
                'services' => $this->hostServices($host),
            ]
        );

        $guestCount = 0;
        foreach ($data['guests'] ?? [] as $guest) {
            $guestOs = OperatingSystem::firstOrCreate(['name' => $this->mapOstype($guest['ostype'] ?? null)]);

            VM::updateOrCreate(
                ['customer_id' => $customer->id, 'agent_identifier' => $guest['identifier']],
                [
                    'site_id' => $site->id,
                    'server_id' => $server->id,
                    'operating_system_id' => $guestOs->id,
                    'name' => $guest['name'] ?? ('VM '.($guest['vmid'] ?? '')),
                    'ip1' => $guest['ip'] ?? null,
                    'services' => $this->guestServices($guest),
                ]
            );
            $guestCount++;
        }

        return response()->json([
            'status' => 'ok',
            'customer' => $customer->name,
            'site' => $site->name,
            'server' => $server->name,
            'server_id' => $server->id,
            'guests_documented' => $guestCount,
        ]);
    }

    protected function hostServices(array $host): string
    {
        $lines = [];
        if (! empty($host['pve_version'])) {
            $lines[] = 'Proxmox VE '.$host['pve_version'];
        }
        if (! empty($host['kernel'])) {
            $lines[] = 'Kernel: '.$host['kernel'];
        }
        if (! empty($host['cpu'])) {
            $lines[] = 'CPU: '.$host['cpu'];
        }
        if (! empty($host['memory_gb'])) {
            $lines[] = 'RAM: '.$host['memory_gb'].' GB';
        }
        if (! empty($host['serial'])) {
            $lines[] = 'Seriennummer: '.$host['serial'];
        }
        foreach ($host['storages'] ?? [] as $storage) {
            $lines[] = sprintf(
                'Storage %s (%s): %s/%s GB',
                $storage['name'] ?? '?',
                $storage['type'] ?? '?',
                isset($storage['used_gb']) ? round($storage['used_gb']) : '?',
                isset($storage['total_gb']) ? round($storage['total_gb']) : '?'
            );
        }
        $lines[] = 'Automatisch dokumentiert am '.now()->format('d.m.Y H:i');

        return implode("\n", $lines);
    }

    protected function guestServices(array $guest): string
    {
        $parts = [];
        if (! empty($guest['vmid'])) {
            $parts[] = 'VMID '.$guest['vmid'];
        }
        if (! empty($guest['type'])) {
            $parts[] = strtoupper($guest['type']);
        }
        if (! empty($guest['status'])) {
            $parts[] = $guest['status'];
        }
        if (! empty($guest['cores'])) {
            $parts[] = $guest['cores'].' Kerne';
        }
        if (! empty($guest['memory_gb'])) {
            $parts[] = $guest['memory_gb'].' GB RAM';
        }

        return implode(', ', $parts);
    }

    protected function mapOstype(?string $ostype): string
    {
        if (! $ostype) {
            return 'Unbekannt';
        }

        return match (true) {
            str_starts_with($ostype, 'l2') => 'Linux',
            str_starts_with($ostype, 'win') => 'Windows',
            $ostype === 'solaris' => 'Solaris',
            default => ucfirst($ostype),
        };
    }
}
