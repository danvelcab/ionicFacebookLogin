<?php

namespace App\Providers;

use app\Repositories\UserRepository;
use app\Services\UserService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Repositories\UserRepository', function ($app) {
            return new UserRepository();
        });

        $this->app->singleton('Services\UserService', function ($app) {
            return new UserService();
        });
    }
}
