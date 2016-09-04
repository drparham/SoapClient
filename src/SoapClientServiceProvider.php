<?php

namespace Drparham\SoapClient;

use Drparham\SoapClient\Library\SoapLibrary;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class SkeletonServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFacade();
        $this->registerConfig();
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([realpath(__DIR__ . '/../config/config.php') => config_path('soap.php'), 'config']);

        $mergePath = realpath(__DIR__ . '/../config/config.php');

        $this->mergeConfigFrom($mergePath, 'soap');
    }

    public function registerFacade()
    {
        $this->app['SoapLibrary'] = $this->app->share(function ($app) {
            return new SoapLibrary();
        });

        $loader = AliasLoader::getInstance();
        $loader->alias('SoapLibrary', 'Drparham\SoapClient\Facade\SoapClientFacade');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}
