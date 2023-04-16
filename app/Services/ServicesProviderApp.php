<?php

namespace App\Services;

use App\Services\ServicesInterface\ProductServiceInterface;
use Illuminate\Support\ServiceProvider;
use App\Services\ServicesInterface\UserServiceInterface;
use App\Services\ServicesWeb\UserService;
use App\Services\ServicesWeb\ProductService;
use App\Services\ServicesInterface\LoginSocialServiceInterface;
use App\Services\ServicesWeb\LoginSocialService;

class ServicesProviderApp extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(LoginSocialServiceInterface::class, LoginSocialService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
