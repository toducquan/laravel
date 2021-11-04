<?php

namespace App\Providers;

use App\Http\Responses\ResponseInterface\PostInterface;
use App\Http\Responses\ResponseInterface\UserInterface;
use App\Http\Services\PostService;
use App\Http\Services\RoleService;
use App\Http\Services\UserService;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->singleton(
            UserInterface::class,
            UserService::class
        );
        $this->app->singleton(
            PostInterface::class,
            PostService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
