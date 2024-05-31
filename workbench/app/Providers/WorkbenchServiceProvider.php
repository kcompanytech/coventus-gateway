<?php

namespace Workbench\App\Providers;

use Illuminate\Support\ServiceProvider;

class WorkbenchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ApiClient::class, function ($app) {
            return new ApiClient(
                config('services.api.client_id'),
                config('services.api.api_key'),
                config('services.api.base_url')
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
