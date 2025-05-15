<?php

namespace RupeshDai\NepalMobileOperators;

use Illuminate\Support\ServiceProvider;

class NepalMobileOperatorsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish configuration
        $this->publishes([
            __DIR__.'/../config/nepalmobileoperators.php' => config_path('nepalmobileoperators.php'),
        ], 'config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Merge configuration
        $this->mergeConfigFrom(
            __DIR__.'/../config/nepalmobileoperators.php', 'nepalmobileoperators'
        );

        // Register the main service
        $this->app->singleton('nepal-mobile-operators', function ($app) {
            return new NepalMobileOperators();
        });
    }
}
