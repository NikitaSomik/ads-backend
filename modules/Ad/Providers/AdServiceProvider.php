<?php

declare(strict_types=1);

namespace Modules\Ad\Providers;

use Illuminate\Support\ServiceProvider;

class AdServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->app->register(RouteServiceProvider::class);
    }
}
