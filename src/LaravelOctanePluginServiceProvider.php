<?php

namespace VitoDeploy\LaravelOctanePlugin;

use App\Plugins\RegisterSiteFeature;
use App\Plugins\RegisterSiteFeatureAction;
use Illuminate\Support\ServiceProvider;

class LaravelOctanePluginServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->app->booted(function () {
            RegisterSiteFeature::make('laravel', 'laravel-octane')
                ->label('Laravel Octane')
                ->description('Enable Laravel Octane for this site')
                ->register();
            RegisterSiteFeatureAction::make('laravel', 'laravel-octane', 'enable')
                ->label('Enable')
                ->handler(Enable::class)
                ->register();
            RegisterSiteFeatureAction::make('laravel', 'laravel-octane', 'disable')
                ->label('Disable')
                ->handler(Disable::class)
                ->register();
        });
    }
}
