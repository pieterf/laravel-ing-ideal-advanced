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
}
