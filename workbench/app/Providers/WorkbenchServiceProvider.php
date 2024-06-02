<?php

namespace Workbench\App\Providers;

use Illuminate\Support\ServiceProvider;
use Kcompany\CoventusGateway\Services\BookingService;
use Kcompany\CoventusGateway\Services\CategoryService;
use Kcompany\CoventusGateway\Services\ClientService;
use Kcompany\CoventusGateway\Services\CurlService;

class WorkbenchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Merge package configuration with the application's configuration
        $this->mergeConfigFrom(
            __DIR__.'/../../config/coventus-gateway.php', 'coventus-gateway'
        );

        $this->app->singleton(CurlService::class, function ($app) {
            return new CurlService();
        });

        $this->app->singleton(BookingService::class, function ($app) {
            return new BookingService($app->make(CurlService::class));
        });

        $this->app->singleton(CategoryService::class, function ($app) {
            return new CategoryService($app->make(CurlService::class));
        });

        $this->app->singleton(ClientService::class, function ($app) {
            return new ClientService(
                $app->make(BookingService::class),
                $app->make(CategoryService::class)
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Publish the configuration file
        $this->publishes([
            __DIR__.'/../../config/coventus-gateway.php' => config_path('coventus-gateway.php'),
        ]);
    }
}
