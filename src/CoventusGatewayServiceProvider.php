<?php

namespace Kcompany\CoventusGateway;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CoventusGatewayServiceProvider extends PackageServiceProvider
{
    /**
     * configurePackage
     */
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
