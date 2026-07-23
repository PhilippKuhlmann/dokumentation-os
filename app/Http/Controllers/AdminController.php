<?php

namespace App\Http\Controllers;

use App\Models\ServerOperatingSystem;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin']);
    }

    public function index()
    {
        $tiles = [
            ['label' => 'Benutzer', 'icon' => 'svg.user',     'count' => \App\Models\User::count(),     'route' => route('admin.user.index')],
            ['label' => 'Kunden',   'icon' => 'svg.office',   'count' => \App\Models\Customer::count(), 'route' => route('admin.customer.index')],
            ['label' => 'Rollen',   'icon' => 'svg.group',    'count' => \App\Models\Role::count(),     'route' => route('admin.role.index')],
            ['label' => 'Aktivitäten', 'icon' => 'svg.document', 'count' => \Spatie\Activitylog\Models\Activity::count(), 'route' => route('admin.activity.index')],
        ];

        // Globale Ablauf-Übersicht (<= 60 Tage, inkl. bereits abgelaufen) über alle Kunden
        $limit = now()->addDays(60);
        $expiring = collect();
        foreach (\App\Models\LicenseSoftware::whereNotNull('end_date')->whereDate('end_date', '<=', $limit)->with('customer')->get() as $l) {
            $expiring->push(['type' => 'Lizenz', 'name' => $l->name, 'date' => $l->end_date, 'customer' => $l->customer, 'route' => $l->customer ? route('licensesoftware.index', $l->customer) : null]);
        }
        foreach (\App\Models\Certificate::whereNotNull('expiry_date')->whereDate('expiry_date', '<=', $limit)->with('customer')->get() as $c) {
            $expiring->push(['type' => 'Zertifikat', 'name' => $c->name, 'date' => $c->expiry_date, 'customer' => $c->customer, 'route' => $c->customer ? route('certificate.index', $c->customer) : null]);
        }
        foreach (\App\Models\Domain::whereNotNull('expiry_date')->whereDate('expiry_date', '<=', $limit)->with('customer')->get() as $d) {
            $expiring->push(['type' => 'Domain', 'name' => $d->name, 'date' => $d->expiry_date, 'customer' => $d->customer, 'route' => $d->customer ? route('domain.index', $d->customer) : null]);
        }
        $expiring = $expiring->sortBy('date')->take(12)->values();

        // Globale Inventar-Statistik (über alle Kunden)
        $inventory = [
            ['label' => 'Server',      'icon' => 'svg.servers',  'count' => \App\Models\Server::count()],
            ['label' => 'VMs',         'icon' => 'svg.server',   'count' => \App\Models\VM::count()],
            ['label' => 'Computer',    'icon' => 'svg.computer', 'count' => \App\Models\Computer::count()],
            ['label' => 'NAS',         'icon' => 'svg.db',       'count' => \App\Models\NAS::count()],
            ['label' => 'Netzwerk',    'icon' => 'svg.wifi',     'count' => \App\Models\NetworkSwitch::count() + \App\Models\Accesspoint::count() + \App\Models\Router::count()],
            ['label' => 'WLAN',        'icon' => 'svg.signal',   'count' => \App\Models\Wifi::count()],
            ['label' => 'Drucker',     'icon' => 'svg.printer',  'count' => \App\Models\Printer::count()],
            ['label' => 'Kameras',     'icon' => 'svg.cam',      'count' => \App\Models\Camera::count()],
            ['label' => 'Telefone',    'icon' => 'svg.phone',    'count' => \App\Models\Phone::count()],
            ['label' => 'AD-User',     'icon' => 'svg.user',     'count' => \App\Models\ADUser::count()],
            ['label' => 'Lizenzen',    'icon' => 'svg.document', 'count' => \App\Models\LicenseSoftware::count() + \App\Models\LicenseWindows::count() + \App\Models\LicenseAccess::count()],
            ['label' => 'Zertifikate', 'icon' => 'svg.document', 'count' => \App\Models\Certificate::count()],
        ];

        // Letzte Aktivitäten
        $activities = \Spatie\Activitylog\Models\Activity::with('causer')->latest()->limit(10)->get();

        // Top-Kunden nach dokumentierten Geräten
        $topCustomers = \App\Models\Customer::withCount(['servers', 'computers', 'vms', 'nas', 'printers', 'cameras', 'networkswitches', 'accesspoints', 'routers', 'wifis', 'phones'])
            ->get()
            ->map(fn ($c) => [
                'name' => $c->name,
                'slug' => $c->slug,
                'count' => $c->servers_count + $c->computers_count + $c->vms_count + $c->nas_count + $c->printers_count
                    + $c->cameras_count + $c->networkswitches_count + $c->accesspoints_count + $c->routers_count + $c->wifis_count + $c->phones_count,
            ])
            ->sortByDesc('count')->take(6)->values();

        // Aktivitäts-Verlauf der letzten 14 Tage
        $byDay = \Spatie\Activitylog\Models\Activity::where('created_at', '>=', now()->subDays(13)->startOfDay())
            ->get()->groupBy(fn ($a) => $a->created_at->format('Y-m-d'))->map->count();
        $chart = [];
        for ($i = 13; $i >= 0; $i--) {
            $day = now()->subDays($i);
            $chart[] = ['label' => $day->format('d.m.'), 'count' => $byDay[$day->format('Y-m-d')] ?? 0];
        }

        return view('admin.index', compact('tiles', 'expiring', 'inventory', 'activities', 'topCustomers', 'chart'));
    }

    public function apitoken()
    {
        $user = auth()->user();
        $token = $user->createToken('optin');

        return ['token' => $token->plainTextToken];
    }


}
