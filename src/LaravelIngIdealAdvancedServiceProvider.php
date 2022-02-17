<?php

namespace Pieterf\LaravelIngIdealAdvanced;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Pieterf\LaravelIngIdealAdvanced\Commands\LaravelIngIdealAdvancedCommand;

class LaravelIngIdealAdvancedServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-ing-ideal-advanced')
            ->hasConfigFile();
    }
}
