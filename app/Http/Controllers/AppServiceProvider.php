<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\Services\CustomService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Share a variable with all views
        View::composer('*', function ($view) {
            $view->with('siteName', 'My Laravel App');
        });

        // Register a custom validation rule
        Validator::extend('custom_rule', function ($attribute, $value, $parameters, $validator) {
            return $value === 'expected_value';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register a custom service
        $this->app->singleton(CustomService::class, function ($app) {
            return new CustomService();
        });
    }
}