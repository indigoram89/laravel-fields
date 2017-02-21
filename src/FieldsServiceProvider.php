<?php

namespace Indigoram89\Fields;

use Illuminate\Support\ServiceProvider;

class FieldsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');

        $this->publishes([__DIR__.'/../config/fields.php' => config_path('fields.php')]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
