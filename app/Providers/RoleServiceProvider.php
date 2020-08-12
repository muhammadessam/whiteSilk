<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton('roleHelper', function () {
            return new \App\RoleAbilityHelper();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        //
    }
}
