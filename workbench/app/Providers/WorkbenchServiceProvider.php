<?php

namespace Workbench\App\Providers;

use Illuminate\Support\ServiceProvider;
use Kcompany\CoventusGateway\Services\BookingService;
use Kcompany\CoventusGateway\Services\CategoryService;
use Kcompany\CoventusGateway\Services\ClientService;
use Kcompany\CoventusGateway\Services\CurlService;
use Kcompany\CoventusGateway\Services\DepartmentService;
use Kcompany\CoventusGateway\Services\FinansService;
use Kcompany\CoventusGateway\Services\GroupService;
use Kcompany\CoventusGateway\Services\LoginService;
use Kcompany\CoventusGateway\Services\MemberService;
use Kcompany\CoventusGateway\Services\OrganizationService;
use Kcompany\CoventusGateway\Services\ResourceService;

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

        $this->app->singleton(DepartmentService::class, function ($app) {
            return new DepartmentService($app->make(CurlService::class));
        });

        $this->app->singleton(FinansService::class, function ($app) {
            return new FinansService($app->make(CurlService::class));
        });

        $this->app->singleton(GroupService::class, function ($app) {
            return new GroupService($app->make(CurlService::class));
        });

        $this->app->singleton(LoginService::class, function ($app) {
            return new LoginService($app->make(CurlService::class));
        });

        $this->app->singleton(MemberService::class, function ($app) {
            return new MemberService($app->make(CurlService::class));
        });

        $this->app->singleton(OrganizationService::class, function ($app) {
            return new OrganizationService($app->make(CurlService::class));
        });

        $this->app->singleton(ResourceService::class, function ($app) {
            return new ResourceService($app->make(CurlService::class));
        });

        $this->app->singleton(ClientService::class, function ($app) {
            return new ClientService(
                $app->make(BookingService::class),
                $app->make(CategoryService::class),
                $app->make(DepartmentService::class),
                $app->make(FinansService::class),
                $app->make(GroupService::class),
                $app->make(LoginService::class),
                $app->make(MemberService::class),
                $app->make(OrganizationService::class),
                $app->make(ResourceService::class)
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
