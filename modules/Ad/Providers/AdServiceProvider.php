<?php

declare(strict_types=1);

namespace Modules\Ad\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Ad\Services\AdStatisticsService;
use Modules\Ad\Services\AdStatisticsServiceInterface;

class AdServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->app->register(RouteServiceProvider::class);

        $this->app->bind(AdStatisticsServiceInterface::class, AdStatisticsService::class);
    }
}
