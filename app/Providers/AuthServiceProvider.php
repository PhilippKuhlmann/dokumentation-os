<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\ADDomainPolicy;
use App\Policies\ADGroupPolicy;
use App\Policies\ADUserPolicy;
use App\Policies\ComputerPolicy;
use App\Policies\ContactpersonPolicy;
use App\Policies\CustomerPolicy;
use App\Policies\GeneralPolicy;
use App\Policies\NASPolicy;
use App\Policies\NetworkPolicy;
use App\Policies\PrinterPolicy;
use App\Policies\RouterPolicy;
use App\Policies\SecurepointUTMPolicy;
use App\Policies\ServerPolicy;
use App\Policies\SitePolicy;
use App\Policies\VMPolicy;
use App\Policies\WifiPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\NAS' => 'App\Policies\NASPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('customer', [CustomerPolicy::class, 'customer']);

        Gate::define('see_hidden', [GeneralPolicy::class, 'see_hidden']);
        Gate::define('create_pdf', [GeneralPolicy::class, 'create_pdf']);




        $resources = config('custom.permissions');

        foreach ($resources as $resource) {
            $policyClass = "App\Policies\\{$resource}Policy";
            $gateName = strtolower($resource);

            Gate::define("{$gateName}_viewAny", [$policyClass, 'viewAny']);
            Gate::define("{$gateName}_create", [$policyClass, 'create']);
            Gate::define("{$gateName}_update", [$policyClass, 'update']);
            Gate::define("{$gateName}_delete", [$policyClass, 'delete']);
        }

    }
}
