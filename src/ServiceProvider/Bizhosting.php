<?php

namespace MadeITBelgium\Bizhosting\ServiceProvider;

use Illuminate\Support\ServiceProvider;
use MadeITBelgium\Bizhosting\Bizhosting as BH;

/**
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2021 Made I.T. (http://www.madeit.be)
 * @author     Tjebbe Lievens <tjebbe.lievens@madeit.be>
 */
class Bizhosting extends ServiceProvider
{
    protected $defer = false;

    protected $rules = [

    ];

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/bizhosting.php' => config_path('bizhosting.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/bizhosting.php', 'bizhosting');


        $this->app->singleton('bizhosting', function ($app) {
            $config = $app->make('config')->get('bizhosting');

            return new BH($config['apitoken'], $config['team_id']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['bizhosting'];
    }
}
