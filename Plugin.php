<?php

namespace App\Vito\Plugins\Vitodeploy\LaravelOctanePlugin;

use App\Plugins\AbstractPlugin;
use App\Plugins\RegisterSiteFeature;
use App\Plugins\RegisterSiteFeatureAction;
use App\Vito\Plugins\Vitodeploy\LaravelOctanePlugin\Actions\Disable;
use App\Vito\Plugins\Vitodeploy\LaravelOctanePlugin\Actions\Enable;

class Plugin extends AbstractPlugin
{
    protected string $name = 'Laravel Octane Plugin';

    protected string $description = 'Laravel Octane plugin for VitoDeploy';

    public function boot(): void
    {
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
    }
}
