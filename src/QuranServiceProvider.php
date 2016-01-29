<?php

namespace FaizShukri\Quran;

use Illuminate\Support\ServiceProvider;

class QuranServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/quran.php', 'quran'
        );

        $this->app->bind(Quran::class, function($app){
            return new Quran($app['config']['quran']);
        });

        $this->app->bind('quran', function($app){
            return new Quran($app['config']['quran']);
        });
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/quran.php' => config_path('quran.php'),
        ]);
    }

}
