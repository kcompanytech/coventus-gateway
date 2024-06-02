<?php

namespace Kcompany\CoventusGateway;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Kcompany\CoventusGateway\Commands\CoventusGatewayCommand;

class CoventusGatewayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('coventus-gateway')
            ->hasConfigFile();
    }
}