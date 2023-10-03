<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('isAdmin', function(User $user) {
            return $user->role->id == 1;
        });

        Gate::define('isCustomer', function(User $user) {
            return $user->role->id == 98 || $user->role->id == 99;
        });

        Gate::define('isCustomerR', function(User $user) {
            return $user->role->id == 98;
        });

        Gate::define('isCustomerRW', function(User $user) {
            return $user->role->id == 99;
        });



        View::composer('*', function ($view) {

            $changelog = file_get_contents('../changelog.md');

            preg_match('/## (\d{2}\.\d{2}\.\d{2})/', $changelog, $matches);
            $version = $matches[1] ?? 'Unbekannt';


            $view->with('version', $version);
        });


    }
}
