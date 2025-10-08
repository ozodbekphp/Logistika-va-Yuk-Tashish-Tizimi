<?php

namespace App\Providers;

// use Illuminate\Support\ServiceProvider;

use App\Interfaces\AdminReportInterface;
use App\Interfaces\LoginInterface;
use App\Repositories\AdminReportRepositories;
use App\Repositories\LoginRepositories;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(LoginInterface::class , LoginRepositories::class);
        $this->app->singleton(AdminReportInterface::class , AdminReportRepositories::class);
    }
}
