<?php

namespace Pieterf\LaravelIngIdealAdvanced;

use Illuminate\Support\Facades\App;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelIngIdealAdvancedServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-ing-ideal-advanced')
            ->hasConfigFile();
    }

    public function registeringPackage()
    {
        App::bind('laravel-ing-ideal-advanced',function() {
            return new \Pieterf\LaravelIngIdealAdvanced\Facades\LaravelIngIdealAdvanced();
        });
    }
}
