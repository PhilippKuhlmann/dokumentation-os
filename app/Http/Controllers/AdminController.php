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

        return view('admin.index', compact('tiles'));
    }

    public function apitoken()
    {
        $user = auth()->user();
        $token = $user->createToken('optin');

        return ['token' => $token->plainTextToken];
    }


}
