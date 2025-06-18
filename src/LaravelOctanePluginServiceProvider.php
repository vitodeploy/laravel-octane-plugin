<?php

namespace VitoDeploy\LaravelOctanePlugin;

use App\DTOs\DynamicField;
use App\DTOs\DynamicForm;
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
        RegisterSiteFeature::make('laravel', 'laravel-octane')
            ->label('Laravel Octane')
            ->description('Enable Laravel Octane for this site')
            ->register();
        RegisterSiteFeatureAction::make('laravel', 'laravel-octane', 'enable')
            ->label('Enable')
            ->form(DynamicForm::make([
                DynamicField::make('alert')
                    ->alert()
                    ->label('Alert')
                    ->description('Make sure you have already set the `OCTANE_SERVER` in your `.env` file'),
                DynamicField::make('port')
                    ->text()
                    ->label('Octane Port')
                    ->default(8000)
                    ->description('The port on which Laravel Octane will run.'),
            ]))
            ->handler(Enable::class)
            ->register();
        RegisterSiteFeatureAction::make('laravel', 'laravel-octane', 'disable')
            ->label('Disable')
            ->handler(Disable::class)
            ->register();
    }
}
