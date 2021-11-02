<?php

namespace App\Providers;

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
        $this->app->bind('UserService', function (){
            return new UserService();
        });
        $this->app->bind('PostService', function (){
            return new PostService();
        });
        $this->app->bind('RoleService', function (){
            return new RoleService();
        });
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
